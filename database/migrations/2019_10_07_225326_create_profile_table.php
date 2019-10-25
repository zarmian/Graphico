<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->longText('p_description');
            $table->bigInteger('u_id')->unsigned();
            $table->string('experience');
            $table->string('location');
            $table->double('rating',2,2);
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('profile', function (Blueprint $table) {
            $table->foreign('u_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
