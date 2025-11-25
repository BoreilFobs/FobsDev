<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;

class HomeController extends Controller
{
    public function index()
    {
        $portfolioItems = PortfolioItem::active()->ordered()->get();
        return view('welcome', compact('portfolioItems'));
    }
}
