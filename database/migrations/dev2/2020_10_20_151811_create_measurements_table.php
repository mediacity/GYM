<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('measurement'))
        {
        Schema::create('measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('neck');
            $table->string('chest')->nullable();
            $table->string('waist');
            $table->string('shoulder');
            $table->string('hips');
            $table->string('calves');
            $table->string('muscle');
            $table->string('r_arm');
            $table->string('l_arm');
            $table->string('thigh_l');
            $table->string('bicep');
            $table->string('bmi');
            $table->string('arm_circumference');
            $table->string('tricep')->nullable();
            $table->string('thigh_r')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('fat')->nullable();
            $table->string('optimal_fat')->nullable();
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_active')->deafault(1);
            $table->string('trainer_name');
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
        Schema::dropIfExists('measurements');
    }
}
