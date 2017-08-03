<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_curso', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_agenda')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_agenda')->references('id')->on('agenda');
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
        Schema::dropIfExists('agenda_curso');
    }
}
