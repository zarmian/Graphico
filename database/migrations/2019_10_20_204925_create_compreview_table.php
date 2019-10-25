<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompreviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compreview', function (Blueprint $table) {
            $table->bigInteger('u_id')->unsigned();
            $table->bigInteger('c_id')->unsigned();
            $table->double('rating',2,2);
            $table->string('review');
            $table->timestamps();
        });
        Schema::table('compreview', function (Blueprint $table) {
            $table->foreign('u_id')->references('id')->on('users');
            $table->foreign('c_id')->references('id')->on('competition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compreview');
    }
}
