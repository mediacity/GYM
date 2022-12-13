<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisenamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('exercisenames'))
        {
        Schema::create('exercisenames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('exercisename')->nullable();
            $table->string('bodypart')->nullable();
            $table->string('type')->nullable();
            $table->string('detail')->nullable();
            $table->int('is_active')->default(1);
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
        Schema::create('exercisenames', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
