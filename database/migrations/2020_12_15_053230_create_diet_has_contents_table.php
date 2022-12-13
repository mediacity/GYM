<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietHasContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_has_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('diet_id');
            $table->string('content');
            $table->double('calories');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('diet_has_contents', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
