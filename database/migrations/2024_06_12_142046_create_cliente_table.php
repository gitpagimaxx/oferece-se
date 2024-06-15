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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 255);
            $table->string('Telefone', 15);
            $table->string('CEP')->nullable();
            $table->string('Endereco')->nullable();
            $table->string('Numero', 20)->nullable();
            $table->string('Complemento', 150)->nullable();
            $table->string('Bairro', 150)->nullable();
            $table->string('Cidade', 150)->nullable();
            $table->string('Estado', 150)->nullable();
            $table->string('Referencia', 150)->nullable();
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
        Schema::dropIfExists('cliente');
    }
};
