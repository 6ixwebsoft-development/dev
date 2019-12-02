<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgLanguagesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_languages', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('language')->nullable();

            $table->string('locale')->nullable();

            $table->string('status')->nullable();

            $table->softDeletes();

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

        Schema::dropIfExists('gg_languages');

    }

}

