<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWatchModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watch_models', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('watch_type_id')->references('id')->on('watch_types');
            $table->foreign('watch_make_id')->references('id')->on('watch_makes');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->foreign('mechanism_type_id')->references('id')->on('mechanism_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watch_models');
    }
}
