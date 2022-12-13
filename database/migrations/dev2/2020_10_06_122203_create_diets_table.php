<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('diets')){
        Schema::create('diets', function (Blueprint $table) {
            $table->id();
            $table->string('dietname');
            $table->string('description');
            $table->string('followup_date')->nullable();
            $table->string('dietincludes')->nullable();
            $table->string('image')->nullable();
            $table->string('diettiming');
            $table->string('session_id');
            $table->boolean('is_active')->deafault(1);
            $table->timestamps();
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
        Schema::dropIfExists('diets');
    }
}
