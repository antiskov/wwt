<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spare_parts_category_id')->nullable();
            $table->foreign('spare_parts_category_id')->references('id')->on('spare_parts_categories');
            $table->unsignedBigInteger('spare_parts_type_id');
            $table->foreign('spare_parts_type_id')->references('id')->on('spare_parts_types');
            $table->unsignedBigInteger('spare_parts_make_id');
            $table->foreign('spare_parts_make_id')->references('id')->on('spare_parts_makes');
            $table->string('title');
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id');
            $table->float('height');
            $table->float('width');
            $table->unsignedBigInteger('spare_parts_mechanism_type_id');
            $table->foreign('spare_parts_mechanism_type_id')->references('id')->on('spare_parts_mechanism_types');
            $table->boolean('is_moderated')->default(0);
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spare_parts_models');
    }
}
