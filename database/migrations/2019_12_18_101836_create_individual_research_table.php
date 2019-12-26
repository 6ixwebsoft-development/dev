<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_research', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->longtext('researchsubject')->nullable();
			$table->longtext('researchobjective')->nullable();
			$table->longtext('researchlimitation')->nullable();
			$table->longtext('researchadditionalinfo')->nullable();
			$table->date('researchstartdate')->nullable();
			$table->date('researchenddate')->nullable();
			$table->integer('researchgovtsupport')->nullable();
			$table->string('researchprevstudy')->nullable();
			$table->string('researchprevschool')->nullable();
			$table->string('researchhighschool')->nullable();
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
        Schema::dropIfExists('individual_research');
    }
}
