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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->enum('Sous-catégories', ['PC_portable','PC_portable_gamer', 'PC_de_bureau']);
            $table->string('Marque');
            $table->string('processor');
            $table->integer('ram');
            $table->integer('rom');
            $table->string('Carte_graphique');
            $table->integer('Poids');
            $table->string('Taille_écran');
            $table->string('Couleur');
            $table->string('Dimensions');
            $table->string('Type_de_batterie');
            $table->string('Système_exploitation');
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité_en_stock');
            $table->text('Description');
            $table->string('Image');
            $table->string('Image2');
            $table->string('Image3');
            $table->string('Image4');
            $table->string('Image5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
