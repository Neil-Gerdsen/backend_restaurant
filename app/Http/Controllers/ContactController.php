<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Store the contact message.
     */
    public function store(Request $request)
    {
        // Valideer de input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Verstuur de email naar het admin emailadres
        // Het "From" adres wordt ingesteld op het email adres dat de gebruiker invult
        Mail::to(config('mail.contact_recipient', 'gerdsen134@gmail.com'))
            ->send(new ContactMessage(
                $validated['name'],
                $validated['email'],
                $validated['message']
            ));

        return redirect('/contact')->with('success', 'Je bericht is succesvol verzonden!');
    }
}
