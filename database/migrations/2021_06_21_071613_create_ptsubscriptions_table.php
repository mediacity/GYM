<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtsubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ptsubscriptions'))
        {
        Schema::create('ptsubscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation_id')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('line1')->nullable();
            $table->string('favourite_music')->nullable();
            $table->string('favourite_snack')->nullable();
            $table->string('issue')->nullable();
            $table->string('smoke')->nullable();
            $table->string('smoke_future')->nullable();
            $table->string('smoke_stop')->nullable();
            $table->string('medicine')->nullable();
            $table->string('medicine_describe')->nullable();
            $table->string('injured')->nullable();
            $table->string('injured_describe')->nullable();
            $table->string('weight')->nullable();
            $table->string('dress_size')->nullable();
            $table->string('goal')->nullable();
            $table->string('feel')->nullable();
            $table->string('have')->nullable();
            $table->string('acheive_goals')->nullable();
            $table->string('motivation')->nullable();
            $table->string('family')->nullable();
            $table->string('friends')->nullable();
            $table->string('work')->nullable();
            $table->string('personal_trainer')->nullable();
            $table->string('activities')->nullable();
            $table->string('do_like')->nullable();
            $table->string('dont_like')->nullable();
            $table->string('dolike')->nullable();
            $table->string('dontlike')->nullable();
            $table->string('cycle_rating')->nullable();
            $table->string('trainer_rating')->nullable();
            $table->string('tread_rating')->nullable();
            $table->string('stepper_rating')->nullable();
            $table->string('rower_rating')->nullable();
            $table->string('exercise_average')->nullable();
            $table->string('extremly_hard')->nullable();
            $table->string('next_page')->nullable();
            $table->string('willing_work')->nullable();
            $table->string('previously_activities')->nullable();
            $table->string('physical_activity')->nullable();
            $table->string('feel_pain')->nullable();
            $table->string('chest_pain')->nullable();
            $table->string('balance')->nullable();
            $table->string('joint')->nullable();
            $table->string('drugs')->nullable();
            $table->string('reason')->nullable();
            $table->string('body_composition')->nullable();
            $table->string('body_mass')->nullable();
            $table->string('skin_fold')->nullable();
            $table->string('endurance_testing')->nullable();
            $table->string('exercise_stress')->nullable();
            $table->string('max_testing')->nullable();
            $table->string('strength_endurance')->nullable();
            $table->string('strength_stability')->nullable();
            $table->string('strength_valuable')->nullable();
            $table->string('flexibility_test')->nullable();

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
        Schema::dropIfExists('ptsubscriptions');
        $table->dropsoftDeletes();
    }
}
