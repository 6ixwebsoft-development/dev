<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateGgLabelTranslationsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gg_label_translations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->Integer('keyword_id');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('gg_languages');
            $table->text('translation')->nullable();
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

        Schema::dropIfExists('gg_label_translations');

    }

}

