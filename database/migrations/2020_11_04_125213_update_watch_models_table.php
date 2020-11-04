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
//            $table->id();
//            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
//            $table->unsignedBigInteger('watch_type_id');
            $table->foreign('watch_type_id')->references('id')->on('watch_types');
//            $table->unsignedBigInteger('watch_make_id');
            $table->foreign('watch_make_id')->references('id')->on('watch_makes');
//            $table->string('title');
//            $table->string('model_code')->nullable();
//            $table->unsignedBigInteger('sex_id');
            $table->foreign('sex_id')->references('id')->on('sexes');
//            $table->float('height');
//            $table->float('width');
//            $table->unsignedBigInteger('mechanism_type_id');
            $table->foreign('mechanism_type_id')->references('id')->on('mechanism_types');
//            $table->boolean('is_moderated')->default(0);
//            $table->string('photo');
//            $table->timestamps();
//            $table->softDeletes();
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
