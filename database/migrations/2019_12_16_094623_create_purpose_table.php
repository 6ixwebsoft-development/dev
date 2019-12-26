<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purpose', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('purpose')->nullable();
			$table->string('formid')->nullable();
			$table->string('hitlist')->nullable();
			$table->string('autoproductid')->nullable();
			$table->string('coustomproductid')->nullable();
			$table->string('purposeid')->nullable();
			$table->string('description1');
			$table->integer('showseaechdesc1')->nullable();
			$table->string('memberdescription1')->nullable();
			$table->integer('showmemberdesc1')->nullable();
			$table->string('description2');
			$table->integer('showseaechdesc2')->nullable();
			$table->string('memberdescription2')->nullable();
			$table->integer('showmemberdesc2')->nullable();
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
        Schema::dropIfExists('purpose');
    }
}
