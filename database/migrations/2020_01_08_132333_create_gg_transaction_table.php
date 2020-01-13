<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('customerid')->nullable();
			$table->integer('orderid')->nullable();
			$table->string('customername')->nullable();
			$table->text('address')->nullable();
			$table->string('selesperson')->nullable();
			$table->double('total')->nullable();
			$table->double('misc')->nullable();
			$table->double('freight')->nullable();
			$table->double('freighttax')->nullable();
			$table->double('totaltax')->nullable();
			$table->double('totalinvoice')->nullable();
			$table->date('orderdate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gg_transaction');
    }
}
