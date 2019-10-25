<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign', function (Blueprint $table) {
            $table->bigInteger('u_id')->unsigned();
            $table->bigInteger('p_id')->unsigned();
            $table->date('deadline');
            $table->timestamps();
        });
        Schema::table('assign', function (Blueprint $table) {
            $table->foreign('u_id')->references('id')->on('users');
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
        Schema::dropIfExists('assign');
    }
}
