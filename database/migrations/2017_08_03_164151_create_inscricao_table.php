<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->dateTime('dataInscricao');
            $table->dateTime('dataCancelamento');
            $table->integer('id_mensalidade')->unsigned();
            $table->integer('id_aluno')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_mensalidade')->references('id')->on('mensalidade');
            $table->foreign('id_aluno')->references('id')->on('aluno');
            $table->foreign('id_curso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricao');
    }
}
