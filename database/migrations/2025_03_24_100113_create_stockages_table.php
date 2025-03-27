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
            $table->enum('Sous-catégories', ['Disque_dur_portable','Disque_dur_interne','Clé_USB', 'Carte_mémoire']);
            $table->string('name');
            $table->string('Marque');
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
        Schema::dropIfExists('stockages');
    }
};
