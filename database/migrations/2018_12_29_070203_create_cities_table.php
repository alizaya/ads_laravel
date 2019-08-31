<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedInteger('county_id');
            $table->foreign('county_id')->references('id')->on('counties');
            $table->string('name');
            $table->timestamps();
        });
        \DB::unprepared(file_get_contents(app_path('sql/cities.sql')));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
