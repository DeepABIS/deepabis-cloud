<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('species_id');
            $table->string('filename');
            $table->string('path');
            $table->timestamps();

            $table->foreign('species_id')->references('id')->on('species')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataset');
    }
}
