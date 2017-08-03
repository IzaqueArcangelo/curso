<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('CPF')->unique();
            $table->integer('id_endereco')->unsigned();
            $table->integer('id_mensalidade')->unsigned();
            $table->foreign('id_endereco')->references('id')->on('endereco');
            $table->foreign('id_mensalidade')->references('id')->on('mensalidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
