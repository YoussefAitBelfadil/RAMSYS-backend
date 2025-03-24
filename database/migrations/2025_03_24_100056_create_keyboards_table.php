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
        Schema::create('keyboards', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->string('Norme du clavier');
            $table->enum('Liaison', ['Avec fil', 'Sans fil']);
            $table->integer('Poids');
            $table->enum('Clavier rétroéclairé', ['OUI', 'NON']);
            $table->enum('Clavier numérique', ['OUI', 'NON']);
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
        Schema::dropIfExists('keyboards');
    }
};
