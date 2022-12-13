<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation')->nullable();
            $table->string('role_type')->default('C');
            $table->string('mobile')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('dob')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->bigInteger('state_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('pincode')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('refer_code')->nullable();
            $table->string('refered_from')->nullable();
            $table->string('file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
