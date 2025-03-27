<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->string('Fonctions');
            $table->string('Cartouches_impression');
            $table->string('Vitesse_impression_noir');
            $table->string('Vitesse_impression_couleur');
            $table->string('Qualité_impression_noire');
            $table->string('Qualité_impression_couleur');
            $table->string('Écran');
            $table->string('Connectivité');
            $table->string('Impression_recto/verso');
            $table->string('Capacité_bac_papier');
            $table->string('Dimensions');
            $table->integer('Poids');
            $table->enum('Photocopieur', ['OUI', 'NON']);
            $table->enum('Câble_fourni', ['OUI', 'NON']);
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
        Schema::dropIfExists('printers');
    }
};
