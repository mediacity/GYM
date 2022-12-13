<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('dietpackages'))
        {
        Schema::create('dietpackages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('diet_package')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('dietpackages');
        $table->dropsoftDeletes();
    }
}
