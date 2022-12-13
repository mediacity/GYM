<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('appointment'))

        {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid')->nullable();
            $table->string('serviceid')->nullable();
            $table->string('appointment_status')->nullable();
            $table->string('detail')->nullable();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('comment')->nullable();
            $table->string('detailcolor')->nullable();
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
