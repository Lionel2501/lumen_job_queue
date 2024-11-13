<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    //
    public function test()
    {
        return response()->json(['message' => 'Ceci est une réponse de la méthode test()']);
    }

    public function addInscripcion(Request $request)
    {
        $nom = $request->input('nom');
        $email = $request->input('email');

        $model = new Inscripcion();

        $response = $model->addInscripcion($nom, $email);
        return $response;
    }
}
