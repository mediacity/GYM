<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('supplement')){
        Schema::create('supplements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
             $table->longtext('detail')->nullable();
            $table->string('price')->nullable();
            $table->string('offerprice')->nullable();
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
        Schema::create('supplements', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
