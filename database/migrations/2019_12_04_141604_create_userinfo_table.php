<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('userid');
			$table->string('fname');
			$table->string('mname')->nullable();
			$table->string('lname');
			$table->date('dateofbirth')->nullable();
			$table->string('language')->nullable();
			$table->string('availability');
			$table->string('streetaddress')->nullable();
			$table->string('zipcode')->nullable();
			$table->string('country')->nullable();
			$table->string('personal')->nullable();
			$table->string('mobile')->nullable();
			$table->string('phone')->nullable();
			$table->string('library')->nullable();
			$table->string('librarynumber')->nullable();
			$table->string('purpose')->nullable();
			$table->string('studymajor')->nullable();
			$table->string('degree')->nullable();
			$table->string('school')->nullable();
			$table->string('location')->nullable();
			$table->date('startdate')->nullable();
			$table->date('enddate')->nullable();
			$table->string('govtsupport')->nullable();
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
        Schema::dropIfExists('userinfo');
    }
}
