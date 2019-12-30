<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->integer('individualid');
			$table->string('gender')->nullable();
			$table->string('civilstatus')->nullable();
			$table->string('occupation')->nullable();
			$table->string('nationality')->nullable();
			$table->string('residenceregion')->nullable();
			$table->string('residencecity')->nullable();
			$table->string('residenceparish')->nullable();
			$table->string('birthregion')->nullable();
			$table->string('birthcity')->nullable();
			$table->string('birthparish')->nullable();
			$table->longtext('applicationletter')->nullable();
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
        Schema::dropIfExists('individual_personal');
    }
}
