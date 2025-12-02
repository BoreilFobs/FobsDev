<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lead::with('assignedUser');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('contact_person', 'like', "%{$search}%")
                  ->orWhere('contact_email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by priority
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter by assigned user
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }

        // Order by
        $query->orderBy('created_at', 'desc');

        $leads = $query->paginate(20);

        // Statistics
        $stats = [
            'total' => Lead::count(),
            'not_touched' => Lead::byStatus(Lead::STATUS_NOT_TOUCHED)->count(),
            'in_progress' => Lead::whereIn('status', [
                Lead::STATUS_ANALYZED,
                Lead::STATUS_EMAIL_SENT,
                Lead::STATUS_RESPONSE_RECEIVED,
                Lead::STATUS_RDV_BOOKED
            ])->count(),
            'completed' => Lead::whereIn('status', [
                Lead::STATUS_CONTRACT_SIGNED,
                Lead::STATUS_WEBSITE_DELIVERED
            ])->count(),
            'needs_followup' => Lead::needsFollowUp()->count(),
        ];

        return view('dashboard.leads.index', compact('leads', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $validated['last_contact_date'] = now();

        $lead = Lead::create($validated);

        // Send notification to all devices
        $this->firebase->notifyNewLead($lead);

        return redirect()->route('dashboard.leads.index')
            ->with('success', 'Lead créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $lead->load('assignedUser');
        return view('dashboard.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        return view('dashboard.leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'maps_link' => 'required|url|unique:leads,maps_link,' . $lead->id,
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
            'next_follow_up_date' => 'nullable|date',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead->update($validated);

        return redirect()->route('dashboard.leads.show', $lead)
            ->with('success', 'Lead mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $companyName = $lead->company_name;
        $lead->delete();

        // Send notification to all devices
        $deletedLead = (object)['company_name' => $companyName];
        $this->firebase->notifyLeadDeleted($deletedLead);

        return redirect()->route('dashboard.leads.index')
            ->with('success', 'Lead supprimé avec succès!');
    }

    /**
     * Update lead status (AJAX)
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:not_touched,analyzed,email_sent,response_received,rdv_booked,contract_signed,website_delivered',
        ]);

        $oldStatus = $lead->status;
        
        $lead->update([
            'status' => $request->status,
            'last_contact_date' => now(),
        ]);

        // Send notification if status changed
        if ($oldStatus !== $request->status) {
            $this->firebase->notifyLeadStatusUpdate($lead, $oldStatus, $request->status);
        }

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour',
            'status_label' => $lead->status_label,
        ]);
    }

    /**
     * Bulk update leads
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
            'action' => 'required|in:delete,update_status,assign',
            'status' => 'required_if:action,update_status',
            'assigned_to' => 'required_if:action,assign',
        ]);

        $leadIds = $request->lead_ids;

        switch ($request->action) {
            case 'delete':
                Lead::whereIn('id', $leadIds)->delete();
                $message = count($leadIds) . ' leads supprimés';
                break;

            case 'update_status':
                Lead::whereIn('id', $leadIds)->update(['status' => $request->status]);
                $message = count($leadIds) . ' leads mis à jour';
                break;

            case 'assign':
                Lead::whereIn('id', $leadIds)->update(['assigned_to' => $request->assigned_to]);
                $message = count($leadIds) . ' leads assignés';
                break;
        }

        return redirect()->route('dashboard.leads.index')
            ->with('success', $message);
    }
}
