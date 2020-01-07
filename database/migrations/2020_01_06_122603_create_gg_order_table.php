<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_order', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			
			$table->string('orderid')->nullable();
			$table->date('orderdate')->nullable();
			$table->date('startdate')->nullable();
			$table->date('enddate')->nullable();
			$table->integer('paymentmood')->nullable();
			$table->integer('orderstatus')->nullable();
			$table->string('type')->nullable();
			$table->integer('quantity')->nullable();
			$table->text('ordernotes')->nullable();
			$table->integer('price')->nullable();
			$table->integer('misc')->nullable();
			$table->integer('vat')->nullable();
			$table->integer('freightcost')->nullable();
			$table->integer('freighttax')->nullable();
			$table->integer('totalprice')->nullable();
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
        Schema::dropIfExists('gg_order');
    }
}
