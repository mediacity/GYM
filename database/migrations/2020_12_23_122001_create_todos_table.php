<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('todos'))

        {
        
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('board_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->text('task')->nullable();
            $table->text('remark')->nullable();
            $table->string('priority',5)->default('m')->comment('h: High, m: Medium, l: Low');
            $table->dateTime('due_on')->nullable();
            $table->dateTime('assigned_on')->nullable();
            $table->boolean('is_complete')->default(0);
            $table->dateTime('completed_on')->nullable();
            $table->boolean('is_checked')->default(0);
            $table->dateTime('checked_on')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('board_id')->references('id')->on('todo_boards')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('todos');
        $table->dropsoftDeletes();
    }
}
