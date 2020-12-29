<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watch_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('watch_type_id')->nullable();
            $table->unsignedBigInteger('watch_make_id')->nullable();
            $table->string('title');
            $table->string('model_code')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->unsignedBigInteger('mechanism_type_id')->nullable();
            $table->boolean('is_moderated')->default(0);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('watch_models');
    }
}
