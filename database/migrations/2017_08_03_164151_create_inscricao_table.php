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
            $table->string('horaInicio');
            $table->string('horaTermino');

            $table->integer('id_dia')->unsigned();
            $table->integer('id_aluno')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->integer('id_professor')->unsigned();

            $table->foreign('id_aluno')->references('id')->on('aluno');
            $table->foreign('id_dia')->references('id')->on('dia');
            $table->foreign('id_curso')->references('id')->on('curso');
            $table->foreign('id_professor')->references('id')->on('professor');
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
