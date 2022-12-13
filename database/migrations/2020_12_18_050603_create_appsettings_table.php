<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('appsettings'))

        {
        Schema::create('appsettings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('copyright')->nullable();
            $table->string('icon')->nullable();
            $table->string('logo')->nullable();
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
        Schema::create('appsettings', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}

