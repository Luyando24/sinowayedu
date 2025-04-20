<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact form
    public function contact()
    {
        return view('contact-us');
    }

    // Handle form submission
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send the email
        Mail::raw($request->message, function ($mail) use ($request) {
    $mail->to('info@spaceminds.agency')
         ->subject($request->subject)
         ->replyTo($request->email, $request->name);
});


        return back()->with('success', 'Your message has been sent! Wew will get back to you soon.');
    }
}
