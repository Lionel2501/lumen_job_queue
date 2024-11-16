<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Jobs\SendConfirmationEmail;
use App\Services\SendEmailConfirmationService;
use Illuminate\Support\Facades\Log;


class Controller extends BaseController
{
    //
    public function test()
    {
        return response()->json(['message' => 'Ceci est une réponse de la méthode test()']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            // 'email' => 'required|email|unique:inscrits,email',
            'email' => 'required|email',
        ]);

        $nom = $request->input('nom');
        $email = $request->input('email');
        
        $inscripcion = Inscripcion::addInscripcion($nom, $email);

        // Ajouter le job à la file
        dispatch(new SendConfirmationEmail($inscripcion));

        Log::info('from controller->store() email: ' . $email);

        // $service = new SendEmailConfirmationService();
        // $service->sendEmail($email, $nom);

        return response()->json([
            'message'   => 'Inscription réussie ! Un e-mail de confirmation est en cours d’envoi.',
            'data'      => $inscripcion
        ]);
    }
}
