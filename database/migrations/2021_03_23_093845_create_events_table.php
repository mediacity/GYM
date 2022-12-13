<?php 
	use Illuminate\Support\Facades\Schema; 
	use Illuminate\Database\Schema\Blueprint; 
	use Illuminate\Database\Migrations\Migration; 
	class CreateEventsTable extends Migration { 
		/** 
		* Run the migrations. 
		* 
		* @return void 
		*/ 
		public function up() 
		{ 
			Schema::create('events', function (Blueprint $table) { 
				$table->increments('id'); 
				$table->string('name'); 
				$table->string('mobile_number');
				$table->string('email');
				$table->integer('amount'); 
				$table->string('order_id'); 
				$table->string('status')->default('pending'); 
				$table->string('transaction_id')->default(0);
				$table->timestamps(); 
			}); 
		} 
		/** 
		* Reverse the migrations. 
		* 
		* @return void 
		*/ 
		public function down() { 
			Schema::dropIfExists('events'); 
		} 
	} 
?>