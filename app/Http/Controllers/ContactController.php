<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $contact = Contact::create($validated);

        // Send push notification to admin
        try {
            $this->firebase->notifyNewContact($contact);
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification: ' . $e->getMessage());
        }

        // Si c'est une requête AJAX (du script validate.js)
        if ($request->ajax() || $request->wantsJson()) {
            return response('OK', 200);
        }

        // Sinon, redirection normale
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        $contact->markAsRead();
        return view('dashboard.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('dashboard.contacts.index')->with('success', 'Message supprimé avec succès.');
    }
}
