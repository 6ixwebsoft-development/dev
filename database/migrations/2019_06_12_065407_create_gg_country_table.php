<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_country', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nation_id')->unsigned();
            $table->foreign('nation_id')->references('id')->on('gg_country_block');
            $table->string('country_code');
            $table->string('country_name');
            $table->string('calling_code');
            $table->string('status');
            $table->unsignedTinyInteger('deleted')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
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
        Schema::dropIfExists('gg_country');
    }
}
