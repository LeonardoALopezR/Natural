<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('groups_id')->unsigned()->index();
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');
            // $table->morphs('group');
            $table->dateTime('departureTime');
            $table->dateTime('arrivalTime');
            $table->bigInteger('vehicles_id')->unsigned()->index();
            $table->foreign('vehicles_id')->references('id')->on('vehicles')->onDelete('cascade');
            // $table->morphs('vehicle');
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
        Schema::dropIfExists('routes');
    }
}
