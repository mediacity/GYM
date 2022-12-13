<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('locker'))

        {
        Schema::create('lockers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid')->nullable();
            $table->string('lockerno')->nullable();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
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
        Schema::create('lockers', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
