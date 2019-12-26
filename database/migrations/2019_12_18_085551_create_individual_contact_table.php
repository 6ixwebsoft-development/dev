<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_contact', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->string('streetadress')->nullable();;
			$table->string('zipcode')->nullable();;
			$table->string('country')->nullable();;
			$table->string('region')->nullable();;
			$table->string('city')->nullable();;
			$table->string('personal')->nullable();;
			$table->string('mobile')->nullable();;
			$table->string('phone')->nullable();;
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
        Schema::dropIfExists('individual_contact');
    }
}
