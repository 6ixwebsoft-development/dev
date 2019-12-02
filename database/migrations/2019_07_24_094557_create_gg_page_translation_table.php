<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgPageTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_page_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page_id')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->integer('language_id')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('gg_page_translation');
    }
}
