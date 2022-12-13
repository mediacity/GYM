<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('faq')){
			Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('details');
            $table->boolean('status')->default(1);
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
        Schema::create('faq', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
