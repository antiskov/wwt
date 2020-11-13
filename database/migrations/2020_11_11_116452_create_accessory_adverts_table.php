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
