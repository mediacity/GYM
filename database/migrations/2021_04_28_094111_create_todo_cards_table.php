<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('todo_cards')){
        Schema::create('todo_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('detail')->nullable();
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('id')->on('todo_boards');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_cards');
    }
}
