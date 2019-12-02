<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgFoundationContactTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_foundation_contact', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('foundation_id')->unsigned();
            $table->foreign('foundation_id')->references('id')->on('gg_foundation');
            $table->string('phone_no')->nullable();

            $table->string('mobile_no')->nullable();

            $table->string('email')->nullable();

            $table->string('website')->nullable();

            $table->string('address1')->nullable();

            $table->string('address2')->nullable();

            $table->string('address3')->nullable();

            $table->string('zip')->nullable();

            $table->string('c_name')->nullable();

            $table->string('c_phone_no')->nullable();

            $table->string('c_mobile_no')->nullable();
            $table->text('c_address')->nullable();

            $table->string('c_email')->nullable();

            

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::drop('gg_foundation_contact');

    }

}

