<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigInteger('p_id')->unsigned();
            $table->bigIncrements('chat_id')->unsigned();
            $table->text('message');
            $table->string('status');
            $table->integer('recever');
            $table->integer('sender');

            $table->timestamps();
        });
        Schema::table('chat', function (Blueprint $table) {
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
        Schema::dropIfExists('chat');
    }
}
