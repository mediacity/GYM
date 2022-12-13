<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!Schema::hasTable('blogs')){
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('blog_cat_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('uni_id')->unique()->nullable();
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('blog_cat_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('blogs');
    }
}
