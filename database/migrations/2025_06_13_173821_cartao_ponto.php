<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('CartaoPonto', function (Blueprint $table) {
        $table->id(); // Cria a coluna 'id' como chave primária
        $table->string('data');
        $table->string('dia_da_semana');
        $table->string('hora_entrada');
        $table->string('hora_entrada_almoco');
        $table->string('hora_saida_almoco');
        $table->string('hora_saida');
        $table->string('hora_extra_entrada');
        $table->string('hora_extra_saida');
        $table->string('hora_trabalhadas');
        $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
