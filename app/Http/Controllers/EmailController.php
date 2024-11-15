<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendTestEmail(Request $request)
    {
        $recipient = $request->input('email', 'lionelcassar92@gmail.com');

        Mail::raw(
            'Ceci est un e-mail de test.', 
            function ($message) use ($recipient) {
                $message->to($recipient)
                        ->subject('Test Email');
            });

        return response()->json(['message' => 'E-mail envoyé avec succès !']);
    }
}
