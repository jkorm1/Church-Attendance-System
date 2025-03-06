<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        // Here you can process the contact form data
        // For example, you could send an email:
        
        // Mail::to('your-email@example.com')->send(new ContactFormMail($validated));
        
        // Or store in database, etc.
        
        // For now, just redirect back with a success message
        return redirect('/#contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}

