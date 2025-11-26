<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // Afficher le formulaire de devis (public)
    public function create()
    {
        return view('quote.create');
    }

    // Sauvegarder la demande de devis
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'project_type' => 'required|in:site_vitrine,e_commerce,application_web,application_mobile,refonte,autre',
            'project_description' => 'required|string',
            'number_of_pages' => 'nullable|integer|min:1',
            'features' => 'nullable|array',
            'has_existing_site' => 'boolean',
            'existing_site_url' => 'nullable|url',
            'need_content_writing' => 'boolean',
            'need_logo_design' => 'boolean',
            'need_hosting' => 'boolean',
            'budget_range' => 'required|numeric|min:100',
            'deadline' => 'required|in:7_jours,2_semaines,1_mois,2_mois,3_mois_plus,flexible',
            'design_preferences' => 'nullable|string',
            'color_preferences' => 'nullable|string',
            'reference_sites' => 'nullable|string',
            'preferred_technologies' => 'nullable|array',
            'additional_info' => 'nullable|string',
            'target_audience' => 'nullable|string',
            'competitors' => 'nullable|array',
        ]);

        Quote::create($validated);

        return redirect()->route('quote.success')->with('success', 'Votre demande de devis a été envoyée avec succès ! Nous vous répondrons dans les plus brefs délais.');
    }

    // Page de confirmation
    public function success()
    {
        return view('quote.success');
    }

    // Dashboard - Liste des devis
    public function index()
    {
        $quotes = Quote::latest()->paginate(20);
        return view('dashboard.quotes.index', compact('quotes'));
    }

    // Dashboard - Voir un devis
    public function show(Quote $quote)
    {
        return view('dashboard.quotes.show', compact('quote'));
    }

    // Dashboard - Mettre à jour le statut
    public function updateStatus(Request $request, Quote $quote)
    {
        $request->validate([
            'status' => 'required|in:nouveau,en_cours,devis_envoye,accepte,refuse,termine',
            'admin_notes' => 'nullable|string'
        ]);

        $quote->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->back()->with('success', 'Statut mis à jour avec succès !');
    }

    // Dashboard - Supprimer un devis
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('dashboard.quotes.index')->with('success', 'Devis supprimé avec succès !');
    }
}
