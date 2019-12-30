<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualWelfareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_welfare', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->integer('individualid');
			$table->longtext('welfareneeds')->nullable();
			$table->longtext('welfareadditionalinfo')->nullable();
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
        Schema::dropIfExists('individual_welfare');
    }
}
