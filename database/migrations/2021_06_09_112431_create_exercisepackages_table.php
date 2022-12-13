<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisepackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if(!Schema::hasTable('exercisepackages'))
        {
        Schema::create('exercisepackages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('exercise_package')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('exercisepackages');
        $table->dropsoftDeletes();
    }
}
