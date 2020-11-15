<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accessory_category_id')->nullable();
            $table->foreign('accessory_category_id')->references('id')->on('accessory_categories');
            $table->unsignedBigInteger('accessory_type_id');
            $table->foreign('accessory_type_id')->references('id')->on('accessory_types');
            $table->unsignedBigInteger('accessory_make_id');
            $table->foreign('accessory_make_id')->references('id')->on('accessory_makes');
            $table->string('title');
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id');
            $table->float('height');
            $table->float('width');
            $table->unsignedBigInteger('accessory_mechanism_type_id');
            $table->foreign('accessory_mechanism_type_id')->references('id')->on('accessory_mechanism_types');
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
        Schema::dropIfExists('accessory_models');
    }
}
