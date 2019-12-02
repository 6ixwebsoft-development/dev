<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationDatesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_dates', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');

            $table->unsignedTinyInteger('sequence')->nullable();

            $table->unsignedTinyInteger('start_month')->nullable();

            $table->unsignedTinyInteger('start_day')->nullable();

            $table->unsignedTinyInteger('end_month')->nullable();

            $table->unsignedTinyInteger('end_day')->nullable();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_dates');

    }

}

