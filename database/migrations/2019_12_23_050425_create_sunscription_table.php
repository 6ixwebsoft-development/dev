<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSunscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sunscription', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->string('name')->nullable();
			$table->string('type')->nullable();
			$table->string('subscriptionid')->nullable();
			$table->date('startdate')->nullable();
			$table->date('enddate')->nullable();
			$table->integer('paymentmood')->nullable();
			$table->integer('paymentstatus')->nullable();
			$table->text('subscriptionnote')->nullable();
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
        Schema::dropIfExists('sunscription');
    }
}
