<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('enid');
            $table->string('user_id');
            $table->string('f_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('phone');
            $table->string('country_id');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('address');
            $table->string('pincode');
            $table->string('dob');
            $table->string('purpose');
            $table->string('details');
            $table->string('description');
            $table->string('question');
            $table->string('date');
            $table->string('age');
            $table->string('purpose');
            $table->string('status');
            $table->string('details');
            $table->string('next_date');
            $table->string('cost_id');
            $table->string('occupation_id');
            $table->string('issue');
            $table->string('religion_id');
            $table->string('second_language');
            $table->string('refrence');
            $table->boolean('is_active')->deafault(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
