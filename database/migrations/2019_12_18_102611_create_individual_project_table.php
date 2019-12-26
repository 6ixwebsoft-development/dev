<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_project', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->longtext('projectobject')->nullable();
			$table->longtext('projectpurpose')->nullable();
			$table->longtext('projectgeoarea')->nullable();
			$table->longtext('projectbeneficiries')->nullable();
			$table->longtext('projectotherinfo')->nullable();
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
        Schema::dropIfExists('individual_project');
    }
}
