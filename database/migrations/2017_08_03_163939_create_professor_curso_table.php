<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_curso', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_professor')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_professor')->references('id')->on('professor');
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
        Schema::dropIfExists('professor_curso');
    }
}
