<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tablettes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->string('Taille_de_la_tablette');
            $table->string('Surface_active');
            $table->string('Touches/Bouton');
            $table->string('Niveaux_de_pression');
            $table->string('Connectivité');
            $table->integer('Poids');
            $table->string('Résolution');
            $table->string('Stylet');
            $table->string('Vitesse_de_lecture');
            $table->string('Câble_fourni');
            $table->string('Batterie');
            $table->string('Durée_de_fonctionnement');
            $table->string('Ergonomie');
            $table->string('Saisie_multi-touch');
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité_en_stock');
            $table->text('Description');
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
