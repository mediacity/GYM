<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('quotations'))
        {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('customerid')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('date')->nullable();
            $table->string('shippingrate')->nullable();
            $table->string('quotation_id')->nullable();
            
            $table->string('additionalnote')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('shipping')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('tax')->nullable();
            $table->string('status')->nullable();
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
        Schema::create('quotations', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
