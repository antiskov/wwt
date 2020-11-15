<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoryAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id')->nullable();
            $table->foreign('advert_id')->references('id')->on('adverts');
            $table->unsignedBigInteger('accessory_make_id')->nullable();
            $table->foreign('accessory_make_id')->references('id')->on('accessory_makes');
            $table->unsignedBigInteger('accessory_model_id')->nullable();
            $table->enum('accessory_state',['new','userd'])->nullable();
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->integer('release_year')->nullable();
            $table->boolean('is_release_year_confirmed')->default(0);
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->unsignedBigInteger('accessory_mechanism_type_id');
            $table->foreign('accessory_mechanism_type_id')->references('id')->on('accessory_mechanism_types');
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
        Schema::dropIfExists('accessory_advets');
    }
}
