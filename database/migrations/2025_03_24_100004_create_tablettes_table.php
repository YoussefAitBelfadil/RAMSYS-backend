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
        Schema::create('tablettes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->string('Taille de la tablette');
            $table->string('Surface active');
            $table->string('Touches/Bouton');
            $table->string('Niveaux de pression');
            $table->string('Connectivité');
            $table->integer('Poids');
            $table->string('Résolution');
            $table->string('Stylet');
            $table->string('Vitesse de lecture');
            $table->string('Câble fourni');
            $table->string('Batterie');
            $table->string('Durée de fonctionnement');
            $table->string('Ergonomie');
            $table->string('Saisie multi-touch');
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité en stock');
            $table->string('Description');
            $table->string('Image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablettes');
    }
};
