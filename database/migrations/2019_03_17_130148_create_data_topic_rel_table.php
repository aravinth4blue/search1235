<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTopicRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_topic_rel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('data_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->foreign('data_id')->references('ID')->on('data')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topic')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_topic_rel');
    }
}
