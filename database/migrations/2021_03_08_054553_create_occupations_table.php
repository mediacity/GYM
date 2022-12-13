<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('occupations'))
        {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('occupation')->nullable();
            $table->softDeletes();
            $table->boolean('is_active')->default(1);
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
        Schema::create('occupations', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
