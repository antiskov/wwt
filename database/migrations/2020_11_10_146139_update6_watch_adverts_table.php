<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update6WatchAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watch_adverts', function (Blueprint $table) {
//            $table->float('thickness', 8, 2);
//            $table->string('bezel');
            $table->unsignedBigInteger('watch_figure_id');
            $table->foreign('watch_figure_id')->references('id')->on('watch_figures');
            $table->unsignedBigInteger('watch_bezel_id');
            $table->foreign('watch_bezel_id')->references('id')->on('watch_bezels');
            $table->unsignedBigInteger('watch_thickness_id');
            $table->foreign('watch_thickness_id')->references('id')->on('watch_thicknesses');
            $table->unsignedBigInteger('watch_waterproof_id');
            $table->foreign('watch_waterproof_id')->references('id')->on('watch_waterproofs');
            $table->unsignedBigInteger('bracelet_clasp_id');
            $table->foreign('bracelet_clasp_id')->references('id')->on('bracelet_clasps');
            $table->unsignedBigInteger('materials_clasp_id');
            $table->foreign('materials_clasp_id')->references('id')->on('materials_clasps');
            $table->unsignedBigInteger('bracelet_color_id');
            $table->foreign('bracelet_color_id')->references('id')->on('bracelet_colors');
            $table->unsignedBigInteger('width_clasp_id');
            $table->foreign('width_clasp_id')->references('id')->on('width_clasps');
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
