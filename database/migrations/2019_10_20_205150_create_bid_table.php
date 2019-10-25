<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('u_id')->unsigned();
            $table->bigInteger('p_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('bid', function (Blueprint $table) {
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
        Schema::dropIfExists('bid');
    }
}
