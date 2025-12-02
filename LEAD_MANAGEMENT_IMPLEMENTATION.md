# Lead Management System - Implementation Plan

## Overview
Complete CRM system for managing potential SME customers from initial contact through website delivery.

---

## Phase 1: Database & Core Models

### ✅ Task 1: Create database migration for leads table
**File:** `database/migrations/YYYY_MM_DD_create_leads_table.php`

**Columns:**
- `id` - Primary key
- `maps_link` - String, unique (Google Maps link to business)
- `company_name` - String, required
- `website_url` - String, nullable
- `category` - String/Enum (restaurant, cafe, hotel, etc.)
- `description` - Text
- `status` - Enum (not_touched, analyzed, email_sent, response_received, rdv_booked, contract_signed, website_delivered)
- `priority` - Enum (low, medium, high)
- `contact_person` - String, nullable
- `contact_email` - String, nullable
- `contact_phone` - String, nullable
- `estimated_value` - Decimal, nullable
- `notes` - Text, nullable
- `last_contact_date` - Date, nullable
- `next_follow_up_date` - Date, nullable
- `assigned_to` - Foreign key to users table, nullable
- `timestamps` - Created at, Updated at
- `soft_deletes` - Deleted at

**Indexes:**
- Unique index on `maps_link`
- Index on `status`
- Index on `category`
- Index on `next_follow_up_date`
- Index on `assigned_to`

---

### ✅ Task 2: Create Lead model with relationships
**File:** `app/Models/Lead.php`

**Features:**
- Fillable fields: all columns except id and timestamps
- Status constants:
  - `NOT_TOUCHED = 'not_touched'`
  - `ANALYZED = 'analyzed'`
  - `EMAIL_SENT = 'email_sent'`
  - `RESPONSE_RECEIVED = 'response_received'`
  - `RDV_BOOKED = 'rdv_booked'`
  - `CONTRACT_SIGNED = 'contract_signed'`
  - `WEBSITE_DELIVERED = 'website_delivered'`
- Casts: status as string, priority as string, estimated_value as decimal
- Relationships:
  - `belongsTo(User::class, 'assigned_to')` - Assigned user
  - `hasMany(LeadActivity::class)` - Activity history
  - `hasMany(LeadDocument::class)` - Attached documents
  - `belongsToMany(Tag::class)` - Tags/labels
- Scopes:
  - `scopeByStatus($query, $status)`
  - `scopeByCategory($query, $category)`
  - `scopeNeedsFollowUp($query)` - Where next_follow_up_date <= today
  - `scopeHighPriority($query)`
  - `scopeAssignedTo($query, $userId)`
- Accessors:
  - `getStatusLabelAttribute()` - Human readable status
  - `getIsOverdueAttribute()` - Check if follow-up is overdue

---

## Phase 2: Controllers & Validation

### ✅ Task 3: Create LeadController with CRUD operations
**File:** `app/Http/Controllers/LeadController.php`

**Methods:**
- `index()` - List all leads with filters (status, category, search, date range)
- `create()` - Show create form
- `store(StoreLeadRequest $request)` - Save new lead
- `show(Lead $lead)` - Display lead details
- `edit(Lead $lead)` - Show edit form
- `update(UpdateLeadRequest $request, Lead $lead)` - Update lead
- `destroy(Lead $lead)` - Soft delete lead
- `updateStatus(Request $request, Lead $lead)` - Quick status update (AJAX)
- `bulkUpdate(Request $request)` - Mass update/delete
- `export()` - Export filtered leads to CSV
- `stats()` - Return dashboard statistics (API endpoint)

---

### ✅ Task 4: Create form requests for validation
**Files:** 
- `app/Http/Requests/StoreLeadRequest.php`
- `app/Http/Requests/UpdateLeadRequest.php`

**Validation Rules (Store):**
```php
'maps_link' => 'required|url|unique:leads,maps_link',
'company_name' => 'required|string|max:255',
'website_url' => 'nullable|url|max:255',
'category' => 'required|string|max:100',
'description' => 'required|string',
'status' => 'required|in:not_touched,analyzed,email_sent,response_received,rdv_booked,contract_signed,website_delivered',
'priority' => 'nullable|in:low,medium,high',
'contact_person' => 'nullable|string|max:255',
'contact_email' => 'nullable|email|max:255',
'contact_phone' => 'nullable|string|max:50',
'estimated_value' => 'nullable|numeric|min:0',
'notes' => 'nullable|string',
'next_follow_up_date' => 'nullable|date|after_or_equal:today',
```

**Update:** Same as store but maps_link unique rule excludes current lead

---

### ✅ Task 5: Add routes for lead management
**File:** `routes/web.php`

**Routes:**
```php
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    // Lead management
    Route::resource('leads', LeadController::class);
    Route::patch('leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');
    Route::post('leads/bulk-update', [LeadController::class, 'bulkUpdate'])->name('leads.bulkUpdate');
    Route::get('leads-export', [LeadController::class, 'export'])->name('leads.export');
    Route::get('leads-stats', [LeadController::class, 'stats'])->name('leads.stats');
    Route::post('leads/import', [LeadController::class, 'import'])->name('leads.import');
});
```

---

## Phase 3: Views & UI

### ✅ Task 6: Create leads index view with filters
**File:** `resources/views/dashboard/leads/index.blade.php`

**Features:**
- View toggle: Kanban board / Table view
- Stats cards at top:
  - Total leads
  - Leads by status (pie chart or counts)
  - Conversion rate
  - Leads needing follow-up (overdue)
- Filters sidebar/dropdown:
  - Search (company name, description)
  - Status multi-select
  - Category multi-select
  - Priority
  - Date range (created, follow-up)
  - Assigned user
- Table view:
  - Columns: Company, Category, Status, Priority, Contact, Next Follow-up, Actions
  - Sortable columns
  - Bulk actions: Delete, Update status, Assign user
  - Row click to view details
- Export to CSV button
- Mobile-responsive: Card layout with swipe actions

---

### ✅ Task 7: Create lead create/edit forms
**Files:** 
- `resources/views/dashboard/leads/create.blade.php`
- `resources/views/dashboard/leads/edit.blade.php`

**Form Fields:**
- Google Maps Link (with validation badge)
- Company Name
- Website URL
- Category (dropdown: Restaurant, Café, Hotel, Bar, Spa, Retail, etc.)
- Description (textarea or rich text editor)
- Status (dropdown)
- Priority (radio buttons or dropdown)
- Contact Person
- Contact Email
- Contact Phone
- Estimated Value (€)
- Notes (textarea)
- Next Follow-up Date (date picker)
- Assign to User (dropdown)

**Features:**
- Real-time Google Maps link validation
- Auto-save draft (localStorage)
- Mobile-optimized with proper spacing
- Brown color scheme matching dashboard

---

### ✅ Task 8: Create lead detail view
**File:** `resources/views/dashboard/leads/show.blade.php`

**Sections:**
1. **Header:**
   - Company name, category badge, priority badge
   - Status dropdown for quick update
   - Action buttons: Edit, Delete, Send Email
   
2. **Company Info Card:**
   - Google Maps embed (iframe)
   - Website link (if available)
   - Contact details
   - Estimated value
   
3. **Description & Notes:**
   - Full description
   - Internal notes
   
4. **Activity Timeline:**
   - All status changes with timestamps
   - Emails sent
   - Notes added
   - Documents uploaded
   
5. **Documents Section:**
   - Uploaded contracts, proposals, images
   - Upload new document button
   
6. **Quick Actions:**
   - Set reminder
   - Send email (opens modal)
   - Update status
   - Add note

---

### ✅ Task 9: Implement Kanban board functionality
**File:** Update `resources/views/dashboard/leads/index.blade.php`

**Implementation:**
- Use SortableJS or drag-and-drop library
- Columns for each status:
  - Not Touched
  - Analyzed
  - Email Sent
  - Response Received
  - RDV Booked
  - Contract Signed
  - Website Delivered
- Lead cards showing:
  - Company name
  - Category icon/badge
  - Priority indicator
  - Last contact date
  - Quick view button
- Drag card to different column → AJAX update status
- Visual feedback on drag
- Card count in column headers
- Scroll horizontally on mobile

**JavaScript:**
```javascript
// AJAX status update on drag
Sortable.create(columnElement, {
    group: 'leads',
    onEnd: function(evt) {
        updateLeadStatus(leadId, newStatus);
    }
});
```

---

## Phase 4: Advanced Features

### ✅ Task 10: Create activity/history tracking system
**Migration:** `database/migrations/YYYY_MM_DD_create_lead_activities_table.php`

**Columns:**
- `id`
- `lead_id` - Foreign key
- `user_id` - Who performed the action
- `activity_type` - Enum (status_change, email_sent, note_added, document_uploaded, etc.)
- `description` - Text (auto-generated or custom)
- `old_value` - JSON (for changes)
- `new_value` - JSON (for changes)
- `metadata` - JSON (additional info)
- `timestamps`

**Model:** `app/Models/LeadActivity.php`

**Observer:** `app/Observers/LeadObserver.php`
- Auto-log status changes
- Auto-log field updates
- Create activity records

---

### ✅ Task 11: Add email template system for leads
**Migration:** `database/migrations/YYYY_MM_DD_create_email_templates_table.php`

**Columns:**
- `id`
- `name` - Template name
- `subject` - Email subject with variables
- `body` - Email body with variables (HTML)
- `type` - Enum (initial_contact, follow_up, proposal, contract, delivery)
- `is_active` - Boolean
- `timestamps`

**Variables supported:**
- `{{company_name}}`
- `{{contact_person}}`
- `{{category}}`
- `{{website_url}}`
- `{{admin_name}}`
- `{{admin_email}}`
- `{{admin_phone}}`

**UI:** `resources/views/dashboard/email-templates/index.blade.php`
- List all templates
- Create/edit templates
- Preview with sample data
- WYSIWYG editor

---

### ✅ Task 12: Implement email sending from dashboard
**Controller:** `app/Http/Controllers/LeadEmailController.php`

**Methods:**
- `compose(Lead $lead)` - Show email compose modal
- `send(Request $request, Lead $lead)` - Send email

**Features:**
- Select template or write custom
- Variable replacement
- BCC to admin email
- Track sent emails in lead_activities
- Email history on lead detail page
- Attachment support

**Mailable:** `app/Mail/LeadEmail.php`

---

### ✅ Task 13: Add reminder/notification system
**Migration:** `database/migrations/YYYY_MM_DD_create_lead_reminders_table.php`

**Columns:**
- `id`
- `lead_id`
- `user_id`
- `reminder_date`
- `reminder_type` - Enum (follow_up, meeting, deadline)
- `message`
- `is_sent` - Boolean
- `sent_at` - Timestamp
- `timestamps`

**Command:** `app/Console/Commands/SendLeadReminders.php`
- Run daily (scheduled in Kernel)
- Check for reminders due today or overdue
- Send Firebase push notification
- Send email notification
- Mark as sent

**Scheduler:** Add to `app/Console/Kernel.php`
```php
$schedule->command('leads:send-reminders')->dailyAt('08:00');
```

**UI:**
- Reminder badge in dashboard header
- Reminder list page
- Create reminder from lead detail page

---

### ✅ Task 14: Create lead analytics dashboard
**File:** `resources/views/dashboard/leads/analytics.blade.php`

**Charts (using Chart.js):**
1. **Conversion Funnel:**
   - Shows leads count at each status
   - Conversion rate between stages
   
2. **Leads by Category:**
   - Pie chart
   
3. **Monthly Acquisition:**
   - Line chart showing new leads per month
   
4. **Status Distribution:**
   - Bar chart
   
5. **Average Time in Status:**
   - How long leads stay in each status
   
6. **Success Metrics:**
   - Total contracts signed
   - Total revenue (from estimated_value)
   - Average deal size
   - Conversion rate (%)

**Filters:**
- Date range
- Category
- Assigned user

---

### ✅ Task 15: Implement lead import from CSV
**Method:** `LeadController@import(Request $request)`

**Process:**
1. Upload CSV file
2. Validate headers (maps_link, company_name, etc.)
3. Preview data (show first 5 rows)
4. Validate each row:
   - Check duplicates by maps_link
   - Validate email format
   - Validate URLs
5. Show validation errors
6. Confirm import
7. Bulk insert valid rows
8. Return summary: X imported, Y skipped (with reasons)

**UI:** Modal or separate page with drag-drop upload

**CSV Template:** Downloadable sample CSV

---

### ✅ Task 16: Add lead export functionality
**Method:** `LeadController@export()`

**Features:**
- Export current filtered results
- Include all fields
- Add activity summary column
- Add status history column
- CSV or Excel format
- Filename: `leads_export_YYYY-MM-DD.csv`

**Button:** On index page header

---

## Phase 5: Additional Features

### ✅ Task 17: Create lead seeder with sample data
**File:** `database/seeders/LeadSeeder.php`

**Sample Data:**
- 20-30 sample leads
- Mix of categories: Restaurants (5), Cafés (5), Hotels (4), Bars (3), Spas (3), Retail (5), Other (5)
- Various statuses distributed
- Realistic company names (Italian businesses)
- Some with websites, some without
- Mix of priorities
- Past and future follow-up dates
- Sample notes and descriptions

---

### ✅ Task 18: Add mobile-responsive design for leads
**Apply to all lead views:**

**Index Page (Mobile):**
- Card layout instead of table
- Swipe left for quick actions (edit, delete)
- Status badge visible
- Tap to expand/collapse details
- Floating action button for "Add Lead"

**Kanban Board (Mobile):**
- Horizontal scroll for columns
- Smaller card height
- Touch-friendly drag
- Status tabs at top

**Forms (Mobile):**
- Full-width inputs
- Larger touch targets (14px+ font)
- Proper spacing (20px+ padding)
- Date/time pickers mobile-friendly
- Category as bottom sheet selector

**Detail Page (Mobile):**
- Stacked layout
- Collapsible sections
- Sticky action buttons at bottom
- Maps iframe responsive

---

### ✅ Task 19: Implement search and advanced filters
**Global Search:**
- Search across: company_name, description, contact_person, contact_email, notes
- Real-time search (debounced)
- Highlight matching terms

**Advanced Filters Panel:**
- Date Range: Created between, Follow-up between
- Status: Multi-select checkboxes
- Category: Multi-select checkboxes
- Priority: Low/Medium/High
- Assigned User: Dropdown
- Has Website: Yes/No/Any
- Tags: Multi-select (if tags implemented)
- Estimated Value: Min-Max range
- Overdue Follow-ups: Checkbox

**Filter UI:**
- Collapsible filter sidebar (desktop)
- Bottom sheet (mobile)
- Active filters displayed as chips
- Clear all filters button
- Save filter presets (optional)

---

### ✅ Task 20: Add document/file attachments to leads
**Migration:** `database/migrations/YYYY_MM_DD_create_lead_documents_table.php`

**Columns:**
- `id`
- `lead_id`
- `user_id` - Who uploaded
- `filename` - Original filename
- `filepath` - Storage path
- `file_type` - MIME type
- `file_size` - In bytes
- `document_type` - Enum (contract, proposal, invoice, other)
- `description` - Text
- `timestamps`

**Storage:** `storage/app/private/leads/{lead_id}/`

**Features:**
- Upload multiple files
- Preview PDFs/images
- Download files
- Delete files
- File type icons
- Maximum file size: 10MB

**UI on Lead Detail Page:**
- Documents section with list
- Upload button
- Preview modal for images/PDFs

---

### ✅ Task 21: Create automated workflow triggers
**Implementation:** Event listeners or observers

**Triggers:**

1. **Status changed to "Email Sent":**
   - Create follow-up reminder for +3 days
   - Log activity

2. **Status changed to "RDV Booked":**
   - Create reminder for RDV date
   - Send confirmation notification

3. **Status changed to "Contract Signed":**
   - Send Firebase notification to admin
   - Create reminder for project kickoff
   - Update estimated_value to final value

4. **Status changed to "Website Delivered":**
   - Send completion notification
   - Archive lead (optional)
   - Request feedback

5. **Follow-up date reached:**
   - Send reminder notification
   - Change priority to high if overdue

**Implementation:**
```php
// app/Observers/LeadObserver.php
public function updated(Lead $lead)
{
    if ($lead->isDirty('status')) {
        $this->handleStatusChange($lead);
    }
}
```

---

### ✅ Task 22: Add tags/labels system for leads
**Migrations:**
- `database/migrations/YYYY_MM_DD_create_tags_table.php`
- `database/migrations/YYYY_MM_DD_create_lead_tag_table.php` (pivot)

**Tags Table:**
- `id`
- `name` - String
- `color` - Hex color code
- `timestamps`

**Pivot Table:**
- `lead_id`
- `tag_id`

**Predefined Tags:**
- Hot Lead (red)
- Cold Lead (blue)
- Referral (green)
- VIP (gold)
- Low Budget (gray)
- Quick Win (orange)

**Model:** `app/Models/Tag.php`

**Features:**
- Create custom tags
- Assign multiple tags to leads
- Filter by tags
- Tag management page
- Color-coded tags in UI

---

### ✅ Task 23: Implement lead scoring system
**Add to leads table migration:**
- `score` - Integer (0-100)

**Scoring Factors:**
- Has website: +10
- High priority: +15
- Responded quickly (<24h): +20
- High estimated value (>€5000): +25
- Has contact email: +10
- Multiple interactions: +5 per interaction
- Opened emails: +10
- Clicked links: +15
- Overdue follow-up: -10

**Calculation:**
- Auto-calculate on lead update
- Store in database for filtering/sorting
- Display as colored badge:
  - 0-30: Cold (blue)
  - 31-60: Warm (yellow)
  - 61-100: Hot (red)

**Features:**
- Score history chart
- Sort by score
- High-score lead alerts
- Score explanation tooltip

---

### ✅ Task 24: Add Google Maps API integration
**Setup:**
- Get Google Maps API key
- Add to `.env`: `GOOGLE_MAPS_API_KEY=xxx`

**Features:**

1. **Maps Link Validation:**
   - Verify URL is valid Google Maps link
   - Extract place ID
   - Fetch place details

2. **Auto-fill from Maps:**
   - When maps_link is entered, fetch:
     - Business name → company_name
     - Phone → contact_phone
     - Website → website_url
     - Address → store in new field
     - Rating → store for reference
     - Category → suggest category
     - Coordinates → lat/lng

3. **Map Preview:**
   - Embed map on lead detail page
   - Show business location
   - Clickable to open in Google Maps

**Implementation:**
```javascript
// Fetch place details when maps_link is entered
async function fetchPlaceDetails(mapsUrl) {
    const placeId = extractPlaceId(mapsUrl);
    const response = await fetch(`/api/maps/place/${placeId}`);
    const data = await response.json();
    // Auto-fill form fields
}
```

---

### ✅ Task 25: Create lead pipeline reports
**File:** `resources/views/dashboard/leads/reports.blade.php`

**Reports:**

1. **Weekly/Monthly Acquisition:**
   - New leads added
   - By category breakdown
   - Comparison to previous period

2. **Conversion Rates:**
   - Overall conversion rate
   - By category
   - By source (if tracked)
   - By assigned user

3. **Revenue Forecast:**
   - Total estimated value of active leads
   - Projected revenue by status probability:
     - Not Touched: 10%
     - Analyzed: 20%
     - Email Sent: 30%
     - Response Received: 50%
     - RDV Booked: 70%
     - Contract Signed: 90%
     - Website Delivered: 100%

4. **Sales Cycle Duration:**
   - Average time from first contact to contract signed
   - By category
   - Identify bottlenecks

5. **Win/Loss Analysis:**
   - Reasons for lost leads
   - Success factors for won deals

**Export:**
- PDF report with charts
- Excel with raw data
- Email scheduled reports (weekly/monthly)

---

### ✅ Task 26: Add navigation menu item for Leads
**File:** `resources/views/dashboard/layout.blade.php`

**Add to sidebar navigation:**
```blade
<li>
    <a href="{{ route('leads.index') }}" class="nav-link {{ request()->routeIs('leads.*') ? 'active' : '' }}">
        <i class="bi bi-briefcase me-2"></i>
        Leads
        @if($leadsNeedingFollowUp > 0)
            <span class="badge bg-danger ms-auto">{{ $leadsNeedingFollowUp }}</span>
        @endif
    </a>
</li>
```

**Icon Options:**
- `bi-briefcase` - Briefcase
- `bi-person-badge` - Person with badge
- `bi-building` - Building
- `bi-graph-up-arrow` - Growth chart

**Badge:** Show count of leads needing follow-up (where next_follow_up_date <= today)

---

### ✅ Task 27: Testing and optimization

**Testing Checklist:**

1. **CRUD Operations:**
   - Create lead with all fields
   - Update lead (partial and full)
   - Delete lead (soft delete)
   - Restore deleted lead
   - Bulk operations

2. **Validations:**
   - Unique maps_link
   - Required fields
   - Email format
   - URL format
   - Date validations

3. **Status Workflow:**
   - Update status manually
   - Drag-drop on Kanban
   - Automated triggers fire correctly
   - Activity logging

4. **Search & Filters:**
   - Search finds correct leads
   - Filters work individually and combined
   - Filter persistence

5. **Email System:**
   - Templates work with variables
   - Emails send successfully
   - BCC to admin
   - Activity logged

6. **Notifications:**
   - Reminders sent on time
   - Firebase push notifications work
   - Email notifications work
   - In-app notification badge

7. **Mobile Responsiveness:**
   - All pages render correctly on mobile
   - Forms are usable
   - Kanban board scrolls
   - Touch interactions work

**Performance Optimization:**

1. **Database:**
   - Add indexes on frequently queried columns
   - Eager load relationships to avoid N+1 queries
   ```php
   Lead::with(['assignedUser', 'activities', 'tags'])->get();
   ```

2. **Caching:**
   - Cache dashboard statistics
   - Cache filter options (categories, tags)
   ```php
   Cache::remember('lead_stats', 3600, function() {
       return Lead::getStatistics();
   });
   ```

3. **Pagination:**
   - Paginate index results (20 per page)
   - Lazy load Kanban cards

4. **Query Optimization:**
   - Use `select()` to retrieve only needed columns
   - Use `whereHas()` efficiently for relationship filters

5. **Load Testing:**
   - Test with 1000+ leads
   - Ensure index page loads < 1 second
   - Kanban board renders smoothly

---

## Implementation Priority

### MVP (Phase 1 - Core Functionality):
1. Database migration & model ✓
2. Basic CRUD controller ✓
3. Form validation ✓
4. Routes ✓
5. Index view (table view) ✓
6. Create/Edit forms ✓
7. Detail view ✓
8. Navigation menu ✓

### Phase 2 (Enhanced Features):
9. Kanban board ✓
10. Activity tracking ✓
11. Search & filters ✓
12. Mobile responsive ✓
13. Sample data seeder ✓

### Phase 3 (Advanced Features):
14. Email templates & sending ✓
15. Reminder system ✓
16. Document attachments ✓
17. Import/Export CSV ✓
18. Analytics dashboard ✓

### Phase 4 (Premium Features):
19. Automated workflows ✓
20. Tags system ✓
21. Lead scoring ✓
22. Google Maps integration ✓
23. Pipeline reports ✓

### Final Phase:
24. Testing & optimization ✓

---

## Estimated Timeline

- **MVP (Phase 1):** 2-3 days
- **Phase 2:** 2 days
- **Phase 3:** 3-4 days
- **Phase 4:** 2-3 days
- **Testing & Optimization:** 1-2 days

**Total:** ~10-14 days for complete implementation

---

## Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Blade templates, Bootstrap 5
- **JavaScript:** Vanilla JS + SortableJS for Kanban
- **Charts:** Chart.js
- **Notifications:** Firebase Cloud Messaging (already implemented)
- **Email:** Laravel Mail with Mailables
- **Storage:** Local filesystem for documents
- **Database:** MySQL with proper indexes

---

## Notes

- All views should follow the brown color scheme (`#a86d37`) matching the existing dashboard
- Mobile-first approach with responsive design
- Consistent spacing and clean UI like existing dashboard pages
- Reuse existing dashboard components (stat-cards, buttons, forms)
- Security: All routes protected with auth middleware
- Soft deletes for leads (can be restored)
- Activity logging for audit trail
- Notification integration with existing Firebase setup

---

Ready to start implementation! 🚀
