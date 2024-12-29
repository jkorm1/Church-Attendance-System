<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'quote' => 'required|string',
        ]);

        Quote::create([
            'author' => $request->input('author'),
            'quote' => $request->input('quote'),
        ]);

        return redirect()->route('quotes.index')->with('success', 'Quote added successfully!');
    }

    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.index', compact('quote'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'quote' => 'required|string',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update([
            'author' => $request->input('author'),
            'quote' => $request->input('quote'),
        ]);

        return redirect()->route('quotes.index')->with('success', 'Quote updated successfully!');
    }
}
