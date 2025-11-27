<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Models\Quote;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $portfolioCount = PortfolioItem::count();
        $activePortfolioCount = PortfolioItem::active()->count();
        
        // Compter les nouvelles demandes de devis
        $newQuotesCount = Quote::where('status', 'nouveau')->count();
        
        // Compter les nouveaux messages de contact
        $newContactsCount = Contact::where('status', 'nouveau')->count();
        
        // Récentes demandes de devis
        $recentQuotes = Quote::latest()->take(5)->get();
        
        // Récents messages de contact
        $recentContacts = Contact::latest()->take(5)->get();
        
        return view('dashboard.index', compact(
            'portfolioCount', 
            'activePortfolioCount',
            'newQuotesCount',
            'newContactsCount',
            'recentQuotes',
            'recentContacts'
        ));
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Store login state in session for permanent login
            if ($remember) {
                $request->session()->put('permanent_login', true);
            }
            
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Clear permanent login state
        $request->session()->forget('permanent_login');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
