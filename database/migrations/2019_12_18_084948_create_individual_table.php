<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('middlename')->nullable();
			$table->string('age')->nullable();
			$table->date('dob')->nullable();
			$table->integer('language')->nullable();
			$table->integer('availability');
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
        Schema::dropIfExists('individual');
    }
}
