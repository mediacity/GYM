<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pages'))
        {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            
            $table->longText('detail')->nullable();
            $table->longText('aboutus')->nullable();
            
            $table->boolean('is_active')->default(1);
            $table->timestamps();
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
        Schema::create('pages', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
