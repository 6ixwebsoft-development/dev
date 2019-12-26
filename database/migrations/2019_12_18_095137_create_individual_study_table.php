<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_study', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->longtext('studyfield')->nullable();
			$table->longtext('studydegree')->nullable();
			$table->longtext('studyschool')->nullable();
			$table->longtext('studylocation')->nullable();
			$table->date('studystart')->nullable();
			$table->date('studyend')->nullable();
			$table->integer('studygovtsupport')->nullable();
			$table->string('studypreviousdegree')->nullable();
			$table->string('studyprevioulength')->nullable();
			$table->string('studypreviousschool')->nullable();
			$table->string('studyprevioulocation')->nullable();
			$table->string('studyhighschool')->nullable();
			$table->string('studyhighlocation')->nullable();
			$table->string('studyhighotherlocation')->nullable();
			$table->string('studyhighotherinfo')->nullable();
			$table->longtext('studyadditionalinfo')->nullable();
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
        Schema::dropIfExists('individual_study');
    }
}
