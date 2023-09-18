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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia');
            $table->string('cnpj')->unique();
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('pais');
            $table->string('telefone');
            $table->string('email');
            $table->string('area_de_atuacao');
            $table->text('quadro_societario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
