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
        Schema::create('oficios', function (Blueprint $table) {
        $table->increments('id');
        $table->string('destino', 20)->nullable();
        $table->string('assunto', 500);
        $table->date('data');
        $table->unsignedBigInteger('setor_id')->nullable();
        // $table->foreign('setor_id');
        $table->boolean('autorizado')->default(false);
        $table->integer('numero')->nullable();
        $table->string('arquivos')->nullable();
        $table->string('numero_processo',20)->nullable();
        $table->tinyInteger('tipo')->default(1);
        $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oficios');
    }
};
