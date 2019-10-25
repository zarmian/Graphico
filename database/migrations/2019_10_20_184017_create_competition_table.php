<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('p_id')->unsigned();
            $table->longText('c_description');
            $table->date('date');
            $table->timestamps();
            $table->foreign('p_id')->references('id')->on('projects');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competition');
    }
}
