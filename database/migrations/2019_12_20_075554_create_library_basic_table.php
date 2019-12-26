<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_basic', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid')->nullable();
			$table->string('library')->nullable();
			$table->integer('groupid')->nullable();
			$table->integer('languageid')->nullable();
			$table->integer('logintype')->nullable();
			$table->integer('usernumber')->nullable();
			$table->integer('availability')->nullable();
			$table->integer('type');
			$table->text('remark')->nullable();
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
        Schema::dropIfExists('library_basic');
    }
}
