<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryloginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librarylogin', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('libraryid');
			$table->integer('activeip')->nullable();
			$table->string('remotename')->nullable();
			$table->integer('remoteactiveip')->nullable();
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
        Schema::dropIfExists('librarylogin');
    }
}
