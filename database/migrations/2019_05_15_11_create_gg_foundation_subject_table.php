<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationSubjectTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_subject', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            //$table->unsignedInteger('frontend_count');
            $table->unsignedInteger('param_id');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_subject');

    }

}

