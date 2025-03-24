<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Taille_écran');
            $table->string('Surface_active');
            $table->string('Luminosité');
            $table->string('Résolution');
            $table->integer('Temps_de_réponse');
            $table->string('Connectivité');
            $table->string('Dimensions');
            $table->integer('Poids');
            $table->string('Consommation_normale');
            $table->string('Description');
            $table->string('Courbure_écran');
            $table->string('Marque');
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité_en_stock');
            $table->string('Image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitors');
    }
};
