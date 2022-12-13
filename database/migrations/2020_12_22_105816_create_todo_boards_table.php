<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('todo_boards'))

        {
        Schema::create('todo_boards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('assigned_to')->unsigned()->nullable();
            $table->text('title')->nullable();
            $table->boolean('is_public')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('todo_boards');
    }
}
