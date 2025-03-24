<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mice', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('Marque');
            $table->enum('Liaison', ['Avec_fil', 'Sans_fil']);
            $table->decimal('Prix', 10, 2);
            $table->integer('Quantité_en_stock');
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
        Schema::dropIfExists('mice');
    }
};
