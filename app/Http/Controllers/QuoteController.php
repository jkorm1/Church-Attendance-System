<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }
    //
}
