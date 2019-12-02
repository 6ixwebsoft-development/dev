<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('gg_country');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('gg_region');
            $table->string('city_name');
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
        Schema::dropIfExists('gg_city');
    }
}
