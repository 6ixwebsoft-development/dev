<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGgModuleFieldsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gg_module_fields_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('field_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('value');
            $table->string('status');
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
        Schema::dropIfExists('gg_module_fields_values');
    }
}
