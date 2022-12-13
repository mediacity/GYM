<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('exercises'))
        {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('exercise_package')->nullable();
            $table->string('session_id')->nullable();
            $table->string('day')->nullable();
            $table->string('exercisename')->nullable();
            $table->longtext('detail')->nullable();
            $table->string('time')->nullable();
            $table->string('video')->nullable();
            $table->string('trainer_id')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('url')->nullable();
            $table->string('followup_date')->nullable();
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
        Schema::create('exercises', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
