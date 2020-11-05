<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update2WatchAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watch_adverts', function (Blueprint $table) {
            $table->unsignedBigInteger('watch_material_id')->nullable();
            $table->foreign('watch_material_id')->references('id')->on('watch_materials');
            $table->unsignedBigInteger('bracelet_material_id')->nullable();
            $table->foreign('bracelet_material_id')->references('id')->on('bracelet_materials');
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
