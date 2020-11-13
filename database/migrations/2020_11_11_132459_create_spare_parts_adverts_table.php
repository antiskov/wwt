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
