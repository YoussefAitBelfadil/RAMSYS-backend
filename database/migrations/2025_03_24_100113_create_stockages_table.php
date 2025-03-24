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
        Schema::create('stockages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->enum('Sous-catégories', ['Disque dur portable','Disque dur interne','Clé USB', 'Carte mémoire']);
            $table->string('name');
            $table->string('Marque');
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
        Schema::dropIfExists('stockages');
    }
};
