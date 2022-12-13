<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('plan_id')->nullable();
            $table->string('total_count')->nullable();
            $table->string('quantity')->nullable();
            $table->string('customer_notify')->nullable();
            $table->string('start_at')->nullable();
            $table->string('expire_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('customer_subscriptions', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}
