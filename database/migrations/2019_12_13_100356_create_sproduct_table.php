<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sproduct', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('productname');
			$table->integer('languageid');
			$table->integer('officeid');
			$table->integer('typeid');
			$table->string('category')->nullable();
			$table->string('currency');
			$table->float('price')->unsigned()->default(0);
			$table->integer('subscription');
			$table->integer('display');
			$table->integer('paymentmood');
			$table->string('discountlabel');
			$table->float('discountamount')->unsigned()->default(0);
			$table->string('vatlabel');
			$table->float('vatamount')->unsigned()->default(0);
			$table->string('freightlabel');
			$table->float('freightamount')->unsigned()->default(0);
			$table->string('freighttaxlabel');
			$table->float('freighttax')->unsigned()->default(0);
			$table->float('totalprice')->unsigned()->default(0);
			$table->longText('description')->nullable();
			
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
        Schema::dropIfExists('sproduct');
    }
}
