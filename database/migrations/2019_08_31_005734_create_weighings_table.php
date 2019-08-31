<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeighingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weighings', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('distributionDate')->unsigned()->index();
            // $table->foreign('distributionDate')->references('id')->on('deliveries');
            $table->dateTime('entryWeightTime');
            $table->dateTime('exitWeightTime');
            $table->bigInteger('collection_id')->unsigned()->index()->nullable();
            $table->foreign('collection_id')->references('id')->on('deliveries');
            // $table->morphs('collection');
            $table->double('emptyGridWeight',5,2);
            $table->double('fullGridWeight',5,2);
            $table->double('fullNumber',5,2);
            $table->double('kg',5,2);
            $table->text('comment');
            $table->text('commentQ');
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
        Schema::dropIfExists('weighings');
    }
}
