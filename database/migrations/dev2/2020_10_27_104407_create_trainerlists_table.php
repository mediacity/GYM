<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainerlists', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('trainer_name');
            $table->string('personaltrainer');
            $table->string('description');
            $table->string('from');
            $table->string('to');
            $table->boolean('is_active')->deafault(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainerlists');
    }
}
