<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('fees'))
      {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();
            $table->longtext('detail')->nullable();
            $table->string('price')->nullable();
            $table->string('offerprice')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('slug')->nullable();
            $table->string('sort')->nullable();
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
        Schema::create('fees', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
