<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('link_by')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('heading')->nullable();
            $table->string('headingtextcolor')->nullable();
            $table->string('subheading')->nullable();
            $table->string('subheadingcolor')->nullable();
            $table->string('buttonname')->nullable();
            $table->string('btntextcolor')->nullable();
            $table->string('btnbgcolor')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::create('sliders', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
