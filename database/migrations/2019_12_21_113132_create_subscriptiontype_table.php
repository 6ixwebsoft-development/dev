<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptiontypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptiontype', function (Blueprint $table) {
            $table->bigIncrements('id');
			 $table->string('usertype');
			 $table->integer('duration');
			 $table->integer('price');
			 $table->string('currency');
			 $table->integer('display');
			 $table->integer('misc');
			 $table->integer('vat');
			 $table->integer('frieghtcharge');
			 $table->integer('frieghttax');
			 $table->integer('totalprice');
			 $table->string('eng_name');
			 $table->text('eng_desc')->nullable();
			 $table->string('sven_name');
			 $table->text('sven_desc')->nullable();
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
        Schema::dropIfExists('subscriptiontype');
    }
}
