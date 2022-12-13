<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoupansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('coupans')){
            
            Schema::create('coupans', function (Blueprint $table) {
                $table->increments('id');
				$table->string('code', 191)->unique();
				$table->string('distype', 100);
				$table->string('amount', 191);
				$table->integer('is_login')->unsigned()->default(0);
				$table->integer('maxusage')->unsigned()->nullable();
				$table->float('minamount', 10, 0)->nullable();
				$table->timestamp('expirydate');
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
        Schema::dropIfExists('coupans');
    }
}
