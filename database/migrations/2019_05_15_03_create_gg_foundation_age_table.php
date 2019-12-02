<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationAgeTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_age', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            $table->unsignedTinyInteger('from')->nullable();

            $table->unsignedTinyInteger('to')->nullable();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_age');

    }

}

