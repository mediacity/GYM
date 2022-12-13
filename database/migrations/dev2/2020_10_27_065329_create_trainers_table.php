<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('trainer_name');
            $table->string('email');
            $table->string('phone');
            $table->string('dob');
            $table->string('address');
            $table->string('pincode');
            $table->string('country_id');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('qualification');
            $table->string('specialization');
            $table->string('experience');
            $table->string('trainer_limit');
            $table->string('type');
            $table->string('rating')->nullable();
            $table->boolean('is_active')->deafault(1);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}
