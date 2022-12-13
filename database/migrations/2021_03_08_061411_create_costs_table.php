<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('costs'))
        {

        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cost')->nullable();
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
        Schema::create('costs', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
