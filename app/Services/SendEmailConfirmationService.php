<?php

namespace App\Services;

use App\Jobs\SendConfirmationEmail;

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
        // Dispatch du job pour exécuter l'envoi d'email en arrière-plan
        dispatch(new SendConfirmationEmail($email, $nom));
    }
}
