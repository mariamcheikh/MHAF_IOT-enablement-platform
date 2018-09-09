<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('timezone');
            $table->mediumText('description');
            $table->integer('noOfPackets');
            $table->integer('timePeriod');
            $table->integer('unity');
            $table->string('dataSource');
            $table->string('login');
            $table->string('pwd');
            $table->string('MQTTTopic');
            $table->array('datagroups');
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
        Schema::dropIfExists('templates');
    }
}