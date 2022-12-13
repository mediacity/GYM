<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubquotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subquotations'))
        {
        Schema::create('subquotation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('quotation_id')->nullable();
            $table->string('productname')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();
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
        Schema::create('subquotations', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
