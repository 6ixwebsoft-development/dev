<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationInstructionsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_instructions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            $table->string('name');

            $table->unsignedTinyInteger('language_id');

            $table->text('instructions');

            $table->datetime('created_on')->nullable();

            $table->datetime('modified_on')->nullable();

            $table->string('created_by');

            $table->string('modified_by')->nullable();

            $table->unsignedTinyInteger('deleted');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_instructions');

    }

}

