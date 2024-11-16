<?php

namespace App\Jobs;

use App\Models\Inscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendConfirmationEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $inscription;

    /**
     * Crée une nouvelle instance de job.
     *
     * @param Inscripcion $inscription
     */
    public function __construct(Inscripcion $inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * Exécuter le job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $email = $this->inscription->email;
            Log::info('from job->handle() email: ' . $email);

            Mail::raw(
                'Ceci est un e-mail de test.', 
                function ($message) use ($email) {
                    $message->to($email)->subject('Test Email');
                }
            );

            // Mettre à jour le statut en cas de succès
            $this->inscription->update(['status' => 'success']);
        } catch (\Exception $e) {
            // Mettre à jour le statut en cas d'échec
            $this->inscription->update(['status' => 'failed']);
        }
    }
}
