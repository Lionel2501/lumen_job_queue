<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscrits'; // Indique que le modèle utilise la table `inscrits`

    protected $fillable = ['nom', 'email', 'status']; // Colonnes que tu veux remplir

    public $timestamps = true; // Si tu utilises `timestamps` dans la table

    public static function addInscripcion($nom, $email)
    {
        return self::create([
            'nom'       => $nom, 
            'email'     => $email,
            'status'    => 'pending'
        ]);
    }
}

