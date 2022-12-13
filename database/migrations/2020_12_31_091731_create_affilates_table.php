<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffilatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('affilates', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id');
            $table->string('per_referral');
            $table->string('min_readme');
            $table->integer('status')->unsigned()->default(0);
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
        Schema::create('affilates', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
