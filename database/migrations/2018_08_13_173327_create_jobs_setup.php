<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uuid');
            $table->string('name');
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city');
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('location_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('zipcode');
            $table->dateTime('end_date');
            
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('services');
        Schema::dropIfExists('locations');
    }
}
