<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('municipality');
            $table->string('locality');
            $table->string('ground');
            $table->double('surfaceHa',8,2);
            $table->string('category');
            $table->string('GPS');
            $table->string('variety');
            $table->string('plantationFrame');
            $table->integer('treesNumberHa');
            $table->double('estimateKgTree',8,2);
            $table->integer('amountTreesZone');
            $table->integer('estimateZone');
            $table->double('organicZone',8,2);
            $table->double('estimateOrganicZone');
            $table->date('lastDate');
            $table->string('annotations');
            $table->text('comment');
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
        Schema::dropIfExists('producers');
    }
}
