<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset_sample', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dataset_id');
            $table->unsignedInteger('sample_id');
            $table->boolean('test');
            $table->timestamps();

            $table->foreign('dataset_id')->references('id')->on('datasets')->onDelete('cascade');
            $table->foreign('sample_id')->references('id')->on('samples')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataset_sample');
    }
}
