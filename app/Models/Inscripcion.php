<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{

    public function addInscripcion($nom, $email)
    {
        return response()->json([
            'nom'   => $nom,
            'email' => $email
        ]);
    }

}