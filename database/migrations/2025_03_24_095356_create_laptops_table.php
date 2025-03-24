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
            $table->enum('Sous-catégories', ['PC portable','PC portable', 'PC de bureau']);
            $table->string('Marque');
            $table->string('processor');
            $table->integer('ram');
            $table->integer('rom');
            $table->string('Carte graphique');
            $table->integer('Poids');
            $table->string('Taille écran');
            $table->string('Couleur');
            $table->string('Dimensions');
            $table->string('Type de batterie');
            $table->string('Système exploitation');
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
        Schema::dropIfExists('laptops');
    }
};
