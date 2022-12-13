<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSiteSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('site_settings')){
        Schema::create('site_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('site_title');
            $table->longtext('site_description')->nullable();
            $table->longtext('site_keyword')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_copyright')->nullable();
            $table->string('support_email')->nullable();
            $table->integer('user_delete_cart')->default(0)->unsigned();
            $table->boolean('inspect_element')->default(1);
             $table->boolean('right_click')->default(1);
            
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
        Schema::dropIfExists('table_site_setting');
    }
}
