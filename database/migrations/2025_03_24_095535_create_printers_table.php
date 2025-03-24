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
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->string('Fonctions');
            $table->integer('Cartouches impression');
            $table->string('Vitesse impression noir');
            $table->string('Vitesse impression couleur');
            $table->integer('Qualité impression noire');
            $table->string('Qualité impression couleur');
            $table->string('Écran');
            $table->string('Connectivité');
            $table->string('Impression recto/verso');
            $table->string('Capacité bac papier');
            $table->string('Dimensions');
            $table->integer('Poids');
            $table->enum('Photocopieur', ['OUI', 'NON']);
            $table->enum('Câble fourni', ['OUI', 'NON']);
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
        Schema::dropIfExists('printers');
    }
};
