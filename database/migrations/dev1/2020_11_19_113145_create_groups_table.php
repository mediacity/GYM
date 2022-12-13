<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('groups'))
        {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longtext('detail')->nullable();
            $table->string('user_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
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
        Schema::create('groups', function (Blueprint $table) {
            $table->dropsoftDeletes();
        });
    }
}