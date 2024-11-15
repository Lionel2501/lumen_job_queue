<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscrits', function (Blueprint $table) {
            $table->id(); // Colonne ID auto-incrémentée
            $table->string('nom')->nullable(); // Nom (type chaîne)
            $table->string('email')->nullable(); // Email (type chaîne, unique)
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscrits'); // Supprime la table si elle existe
    }
};
