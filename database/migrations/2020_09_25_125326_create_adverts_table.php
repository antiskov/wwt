<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
//            $table->enum('type',['watch','accessories','parts']);
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->string('title');
//            $table->text('description')->nullable();
//            $table->integer('price')->nullable();
//            $table->unsignedBigInteger('currency_id');
//            $table->foreign('currency_id')->references('id')->on('currencies');
//            $table->unsignedBigInteger('status_id')->default(0);
//            $table->foreign('status_id')->references('id')->on('statuses');
//            $table->string('surname')->nullable();
//            $table->string('name')->nullable();
//            $table->date('birthday')->nullable();
//            $table->string('phone',20)->nullable();
//            $table->string('country')->nullable();
//            $table->string('region')->nullable();
//            $table->string('city')->nullable();
//            $table->string('street')->nullable();
//            $table->string('zip_code')->nullable();
//            $table->float('latitude')->nullable();
//            $table->float('longtitude')->nullable();
//            $table->boolean('is_publish_surname')->default(1);
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
        Schema::dropIfExists('adverts');
    }
}
