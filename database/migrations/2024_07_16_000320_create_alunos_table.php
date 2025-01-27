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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo','10');
            $table->string('primeiroNome','150');
            $table->string('sobrenome',50);
            $table->date('nascimento');
      
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade')->onUpdate('cascade');

            $table->string('situacao','20');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
