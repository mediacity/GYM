<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('packages'))
        {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longtext('detail')->nullable();
            $table->string('duration')->nullable();
            $table->string('price')->nullable();
            $table->string('offerprice');
            $table->boolean('is_active')->default(1);
            $table->string('stripe_id')->nullable();
            $table->string('sort')->nullable();
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
        Schema::create('packages', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
