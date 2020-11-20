<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts_adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id')->nullable();
            $table->foreign('advert_id')->references('id')->on('adverts');
            $table->unsignedBigInteger('spare_parts_make_id')->nullable();
            $table->foreign('spare_parts_make_id')->references('id')->on('spare_parts_makes');
            $table->unsignedBigInteger('spare_parts_model_id')->nullable();
            $table->foreign('spare_parts_model_id')->references('id')->on('spare_parts_models');
            $table->enum('spare_parts_state',['new','userd'])->nullable();
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->integer('release_year')->nullable();
            $table->boolean('is_release_year_confirmed')->default(0);
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->unsignedBigInteger('spare_parts_mechanism_type_id');
            $table->foreign('spare_parts_mechanism_type_id')->references('id')->on('spare_parts_mechanism_types');
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
        Schema::dropIfExists('spare_parts_adverts');
    }
}
