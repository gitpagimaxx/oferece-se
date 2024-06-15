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
        Schema::create('oferta_item', function (Blueprint $table) {
            $table->id();
            $table->integer('OfertaId');
            $table->string('Item', 250);
            $table->decimal('Valor', 10, 2);
            $table->string('TextoWhatsApp', 500);
            $table->integer('UserId')->default(1);
            $table->boolean('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferta_item');
    }
};
