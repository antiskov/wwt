<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id')->nullable();
            $table->unsignedBigInteger('watch_type_id')->nullable();
            $table->unsignedBigInteger('watch_make_id')->nullable();
            $table->unsignedBigInteger('watch_model_id')->nullable();
            $table->enum('watch_state',['new','used'])->nullable();
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->integer('release_year')->nullable();
            $table->boolean('is_release_year_confirmed')->default(0);
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->unsignedBigInteger('mechanism_type_id')->nullable();
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
        Schema::dropIfExists('watch_adverts');
    }
}
