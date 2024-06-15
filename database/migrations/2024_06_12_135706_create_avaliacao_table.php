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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 255)->nullable();
            $table->string('Telefone', 15)->nullable();
            $table->integer('Atendimento')->nullable();
            $table->integer('Entrega')->nullable();
            $table->string('Observacao', 500)->nullable();
            $table->integer('VendaId')->default(1);
            $table->integer('Publicar')->default(1);
            $table->integer('PerfilId')->default(1);
            $table->boolean('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
