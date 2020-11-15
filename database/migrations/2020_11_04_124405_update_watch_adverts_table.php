<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWatchAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watch_adverts', function (Blueprint $table) {
            $table->foreign('advert_id')->references('id')->on('adverts');
//            $table->foreign('watch_type_id')->references('id')->on('watch_types');
            $table->foreign('watch_make_id')->references('id')->on('watch_makes');
            $table->foreign('watch_model_id')->references('id')->on('watch_models');
            $table->foreign('mechanism_type_id')->references('id')->on('mechanism_types');
            $table->foreign('sex_id')->references('id')->on('sexes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watch_adverts');
    }
}
