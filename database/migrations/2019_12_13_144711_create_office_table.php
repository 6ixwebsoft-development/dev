<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('country');
			$table->integer('countrycode');
			$table->string('city');
			$table->string('office');
			$table->string('tag');
			$table->integer('phonenumber');
			$table->string('faxnumber');
			$table->string('tinnumber');
			$table->string('bankaccount');
			$table->string('bankcode');
			$table->string('address1');
			$table->string('address2');
			$table->string('address3');
			$table->string('address4');
			$table->string('address5');
			$table->string('urladdress');
			$table->string('email');
			$table->string('googlemap');
			$table->integer('status');
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
        Schema::dropIfExists('office');
    }
}
