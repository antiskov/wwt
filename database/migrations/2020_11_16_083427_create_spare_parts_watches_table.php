<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts_watches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spare_parts_advert_id');
            $table->foreign('spare_parts_advert_id')->references('id')->on('spare_parts_adverts');
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
        Schema::dropIfExists('spare_parts_watches');
    }
}
