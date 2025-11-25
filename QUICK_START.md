# 🚀 Quick Start Guide - Portfolio Dashboard

## 📋 What Was Created

A complete admin dashboard to manage your portfolio dynamically!

### ✨ Features
- ✅ Add/Edit/Delete portfolio projects
- ✅ Upload images for each project
- ✅ Control which projects show on homepage
- ✅ Reorder projects as you like
- ✅ Secure login system

---

## 🔑 Admin Login

**URL**: `http://localhost/admin/login` (or your domain)

**Default Credentials**:
- Email: `admin@fobsdev.com`
- Password: `password123`

⚠️ **CHANGE THESE IMMEDIATELY FOR SECURITY!**

---

## 📊 Dashboard Pages

1. **Login Page**: `/admin/login`
2. **Dashboard Home**: `/dashboard`
3. **All Projects**: `/dashboard/portfolio`
4. **Add Project**: `/dashboard/portfolio/create`
5. **Edit Project**: `/dashboard/portfolio/{id}/edit`

---

## ➕ Adding a New Project

1. Go to `/dashboard/portfolio/create`
2. Fill in:
   - **Title**: Project name (e.g., "My Awesome App")
   - **Category**: Type (e.g., "Mobile Development")
   - **Description**: What the project does
   - **Main Image**: Upload main screenshot/image
   - **Gallery**: Upload more images (optional)
   - **URL**: Link to project page (e.g., `/my-project`)
   - **Order**: Number for sorting (lower = first)
   - **Status**: Active (visible) or Inactive (hidden)
3. Click "Create Project"

---

## ✏️ Editing a Project

1. Go to `/dashboard/portfolio`
2. Find your project
3. Click the pencil (✏️) icon
4. Update any fields
5. Upload new images if needed
6. Click "Update Project"

---

## 🗑️ Deleting a Project

1. Go to `/dashboard/portfolio`
2. Find your project
3. Click the trash (🗑️) icon
4. Confirm deletion

---

## 📸 Image Guidelines

- **Size**: Max 2MB per image
- **Format**: JPG, PNG, GIF
- **Recommended**: 800x600px
- **Storage**: `public/assets/img/portfolio/{project-name}/`

---

## 🔧 Important Commands

### Run Migrations (if needed)
```bash
php artisan migrate
```

### Seed Initial Data
```bash
php artisan db:seed --class=PortfolioItemSeeder
```

### Create New Admin User
```bash
php artisan tinker --execute="App\Models\User::create(['name' => 'Admin', 'email' => 'newemail@example.com', 'password' => bcrypt('newpassword')]);"
```

---

## 📁 Files Created

### Models
- `app/Models/PortfolioItem.php`

### Controllers
- `app/Http/Controllers/DashboardController.php`
- `app/Http/Controllers/PortfolioItemController.php`
- `app/Http/Controllers/HomeController.php`

### Views
- `resources/views/dashboard/login.blade.php`
- `resources/views/dashboard/layout.blade.php`
- `resources/views/dashboard/index.blade.php`
- `resources/views/dashboard/portfolio/index.blade.php`
- `resources/views/dashboard/portfolio/create.blade.php`
- `resources/views/dashboard/portfolio/edit.blade.php`

### Database
- `database/migrations/2025_11_25_123648_create_portfolio_items_table.php`
- `database/seeders/PortfolioItemSeeder.php`

### Modified Files
- `routes/web.php` - Added dashboard routes
- `resources/views/welcome.blade.php` - Now loads portfolio from database

---

## 💡 Tips

1. **Order Projects**: Use numbers like 10, 20, 30 for easier reordering
2. **Hide Temporarily**: Set to "Inactive" instead of deleting
3. **Test Changes**: Click "View Portfolio Site" in dashboard
4. **Backup Images**: Keep original images saved elsewhere
5. **Clear Cache**: If changes don't appear, clear browser cache

---

## 🎯 Your Current Projects (Seeded)

✅ **FobsSMS** - School Management System
✅ **EDUCAM** - GCE Revision Platform  
✅ **Glow & Chic** - E-commerce Platform

All are now in the database and editable!

---

## ❓ Need Help?

See `DASHBOARD_DOCUMENTATION.md` for detailed information.

---

**Ready to Go!** 🎉

Visit `/admin/login` and start managing your portfolio!
