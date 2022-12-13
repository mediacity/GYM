<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('levels'))
        {
        
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('level')->nullable();
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
        Schema::create('levels', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
