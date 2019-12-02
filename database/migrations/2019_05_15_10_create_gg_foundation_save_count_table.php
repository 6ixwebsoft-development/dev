<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationSaveCountTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_save_count', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            $table->unsignedInteger('frontend_count');

            $table->unsignedInteger('backend_count');

            $table->unsignedInteger('list_total');

            $table->unsignedInteger('user_total');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_save_count');

    }

}

