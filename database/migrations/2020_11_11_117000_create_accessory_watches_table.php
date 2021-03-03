<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoryWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_watches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accessory_advert_id');
            $table->foreign('accessory_advert_id')->references('id')->on('accessory_adverts');
            $table->unsignedBigInteger('watch_model_id');
            $table->foreign('watch_model_id')->references('id')->on('watch_models');
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
        Schema::dropIfExists('accessory_watches');
    }
}
