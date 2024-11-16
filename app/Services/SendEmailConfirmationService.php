<?php

namespace App\Services;

use App\Jobs\SendConfirmationEmail;
use Illuminate\Support\Facades\Mail;


class SendEmailConfirmationService
{
    /**
     * Gérer l'envoi de l'email en arrière-plan.
     *
     * @param string $email
     * @param string $nom
     * @return void
     */
    public function sendEmail($email, $nom)
    {
        try {

            Mail::raw(
                'Ceci est un e-mail de test.', 
                function ($message) use ($email) {
                    $message->to($email)->subject('Test Email');
                }
            );

        } catch (\Exception $e) {
            return 'hello';
        }
    }
}
