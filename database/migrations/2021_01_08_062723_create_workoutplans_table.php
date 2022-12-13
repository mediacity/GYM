<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('workoutplans'))
        {
        
        Schema::create('workoutplans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('goal_name')->nullable();
            $table->string('level_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('days')->nullable();
            $table->string('note')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::create('workoutplans', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
