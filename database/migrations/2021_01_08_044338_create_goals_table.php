<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('goals'))
        {
        
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('goal')->nullable();
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
        Schema::create('goals', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
