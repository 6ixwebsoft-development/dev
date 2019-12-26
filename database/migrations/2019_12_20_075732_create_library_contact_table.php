<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_contact', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('userid')->nullable();
			$table->integer('libraryid')->nullable();
			$table->string('contactname')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('mobile')->nullable();
			$table->text('website')->nullable();
			$table->text('remotearena')->nullable();
			$table->string('contactaddress')->nullable();
			$table->string('contactzip')->nullable();
			$table->integer('contactcountry')->nullable();
			$table->integer('contactcity')->nullable();
			$table->string('postaladdress')->nullable();
			$table->string('postalzip')->nullable();
			$table->integer('postalcountry')->nullable();
			$table->integer('postalcity')->nullable();
			$table->text('about_sve')->nullable();
			$table->text('about_eng')->nullable();
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
        Schema::dropIfExists('library_contact');
    }
}
