<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('sort')->nullable();

            $table->string('name')->nullable();

            $table->string('administrator')->nullable();

            $table->string('status')->nullable();

            $table->string('asset')->nullable();

            $table->string('source')->nullable();

            $table->string('language')->nullable();

            $table->string('type')->nullable();

            $table->string('system_generated_url')->nullable();

            $table->string('org_no')->nullable();

            $table->text('remarks')->nullable();

            $table->string('tillsyn')->nullable();

            $table->unsignedTinyInteger('show_to_free_users')->nullable();

            $table->string('verification_code')->nullable();

            $table->datetime('verified_date')->nullable();

            $table->unsignedTinyInteger('deleted')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();

            $table->datetime('created_on')->nullable();

            $table->unsignedBigInteger('modified_by')->nullable();

            $table->datetime('modified_on')->nullable();

            //$table->timestamps();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation');

    }

}

