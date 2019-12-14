<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentmoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmood', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('paymentmethod');
			$table->string('daysnet');
			$table->string('testaccount');
			$table->string('testusername');
			$table->string('testpassword');
			$table->string('testsignature');
			$table->string('liveaccount');
			$table->string('liveusername');
			$table->string('livepassword');
			$table->string('livesignature');
			$table->integer('testmood');
			$table->text('otherpreferences');
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
        Schema::dropIfExists('paymentmood');
    }
}
