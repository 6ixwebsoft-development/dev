<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_region', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('gg_country');
            $table->string('region_name');
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
        Schema::dropIfExists('gg_region');
    }
}
