<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('social')){
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();            
            $table->string('url')->nullable();           
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('socials');
    }
}
