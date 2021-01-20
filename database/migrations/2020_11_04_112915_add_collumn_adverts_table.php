<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->enum('availability_status', ['In stock', 'Pending', 'Not available'])->default('In stock');
            $table->unsignedBigInteger('delivery_volume_id');
            $table->foreign('delivery_volume_id')->references('id')->on('delivery_volumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
