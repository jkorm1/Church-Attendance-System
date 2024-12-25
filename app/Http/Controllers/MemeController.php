<?php

namespace App\Http\Controllers;

use App\Models\Meme;

class MemeController extends Controller
{
    public function index()
    {
        $memes = Meme::all();
        return view('memes.index', compact('memes'));
    }
}
