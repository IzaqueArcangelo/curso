<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->date('dataPagamento');
            $table->double('valorPago');
            $table->integer('mes_referencia')->unsigned();
            $table->integer('ano_referencia')->unsigned();
            $table->integer('id_mensalidade')->unsigned();
            $table->foreign('mes_referencia')->references('id')->on('mes');
            $table->foreign('ano_referencia')->references('id')->on('ano');
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
        Schema::dropIfExists('pagamento');
    }
}
