<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('appointmentsettings'))

        {
        Schema::create('appointmentsettings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slot')->nullable();
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
        Schema::create('appointmentsettings', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
