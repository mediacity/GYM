<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('selectpages'))
        {
        Schema::create('selectpages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('page_id')->nullable();
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
        Schema::create('selectpages', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
