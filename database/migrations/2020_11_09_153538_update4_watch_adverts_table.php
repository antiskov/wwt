<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update4WatchAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watch_adverts', function (Blueprint $table) {
            $table->unsignedBigInteger('diameter_watch_id');
            $table->foreign('diameter_watch_id')->references('id')->on('diameter_watches');
            $table->unsignedBigInteger('year_advert_id');
            $table->foreign('year_advert_id')->references('id')->on('year_adverts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
