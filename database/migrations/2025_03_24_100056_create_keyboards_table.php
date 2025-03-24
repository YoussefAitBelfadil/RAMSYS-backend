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
            $table->string('Norme_du_clavier');
            $table->enum('Liaison', ['Avec_fil', 'Sans_fil']);
            $table->integer('Poids');
            $table->enum('Clavier_rétroéclairé', ['OUI', 'NON']);
            $table->enum('Clavier_numérique', ['OUI', 'NON']);
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité_en_stock');
            $table->string('Description');
            $table->string('Image');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('keyboards');
    }
};
