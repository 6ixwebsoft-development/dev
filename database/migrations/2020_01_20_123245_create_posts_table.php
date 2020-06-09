<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();            
            $table->string("description");
            $table->string("media_link")->nullable();
            $table->string("media_type");
            $table->text("recipients");
            $table->string("recipient_type");
            $table->date("send_date")->nullable();
            $table->integer("day")->nullable();
            $table->integer("sent")->defualt(0);
            $table->integer("status")->defualt(1);                        
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
        Schema::dropIfExists('posts');
    }
}
