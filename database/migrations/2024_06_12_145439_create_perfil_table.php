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
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 250);
            $table->string('NomeUsuario', 250);
            $table->string('Logotipo', 250)->nullable();
            $table->string('Telefone', 15)->nullable();
            $table->string('WhatsApp', 15)->nullable();
            $table->text('Localizacao', 500)->nullable();
            $table->string('LinkMaps', 300)->nullable();
            $table->string('HorarioAtendimento', 300)->nullable();
            $table->boolean('Buscador', 250)->nullable();
            $table->boolean('Delivery', 250)->nullable();
            $table->boolean('Avaliacoes', 250)->nullable();  
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
        Schema::dropIfExists('perfil');
    }
};
