<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_library', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->integer('librarycity')->nullable();
			$table->integer('librarycardnumber')->nullable();
			$table->longtext('librarycomment')->nullable();
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
        Schema::dropIfExists('individual_library');
    }
}
