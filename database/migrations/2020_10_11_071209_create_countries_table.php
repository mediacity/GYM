<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('countries')){
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('iso');
                $table->string('nicename');
                $table->string('name');
                $table->string('iso3');
                $table->integer('numcode')->unsigned();
                $table->integer('phonecode')->unsigned();
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
        Schema::dropIfExists('countries');
    }
}
