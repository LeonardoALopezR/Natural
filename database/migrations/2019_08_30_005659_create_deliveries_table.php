<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('callDate');
            $table->date('distributionDate')->nullable($value = true);
            $table->integer('deliveredGridNumber');
            $table->integer('returnedGridNumber')->nullable($value = true);
            $table->text('comment');
            $table->bigInteger('producer_id')->unsigned()->index()->nullable();
            $table->foreign('producer_id')->references('id')->on('producers');
            //$table->morphs('producer');
            $table->boolean('deliveryStatus');
            $table->text('signature');
            $table->boolean('isDelivery');
            $table->bigInteger('collect_id')->unsigned()->index()->nullable();
            $table->foreign('collect_id')->references('id')->on('deliveries');
            //$table->morphs('collect')->nullable($value = true);
            $table->bigInteger('group_id')->unsigned()->index()->nullable();
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('deliveries');
    }
}
