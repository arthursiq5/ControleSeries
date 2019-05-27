<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporadas', function (Blueprint $table) {
            $table->bigIncrements('id'); // id da temporada

            $table->integer('numero'); // diz o numero da temporada (ex: 4 == temporada 4)

            $table->integer('serie_id'); // referencia ao id da serie

            $table->foreign('serie_id') // transforma o campo 'serie_id' em uma chave estrangeira
              ->references('id')
              ->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
