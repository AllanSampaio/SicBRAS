<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinamentos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('carga_horaria');
            $table->enum('reciclagem', ['Sim', 'Nao']);
            $table->date('dt_inicio');
            $table->date('dt_fim');  
            $table->integer('validade')->unsigned();     
            $table->date('dt_reciclagem');
            $table->string('local',80);
            $table->string('disponibilidade',80);

            $table->integer('tptreinamentos_id')->unsigned();
            $table->foreign('tptreinamentos_id')->references('id')->on('tptreinamentos');

            $table->integer('espectreinamentos_id')->unsigned();
            $table->foreign('espectreinamentos_id')->references('id')->on('espectreinamentos');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treinamentos');
    }
}
