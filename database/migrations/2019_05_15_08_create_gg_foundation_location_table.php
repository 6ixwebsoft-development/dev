<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationLocationTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_location', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            $table->unsignedTinyInteger('sequence')->nullable();

            $table->unsignedInteger('nation_id')->nullable();

            $table->unsignedInteger('country_id')->nullable();

            $table->unsignedInteger('region_id')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();

            $table->string('parish')->nullable();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_location');

    }

}

