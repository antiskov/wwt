<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('watch_advert_id');
            $table->foreign('watch_advert_id')->references('id')->on('watch_adverts');
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options');
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
        Schema::dropIfExists('watch_options');
    }
}
