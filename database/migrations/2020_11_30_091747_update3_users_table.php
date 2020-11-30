<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update3UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('referral_user_id')->nullable();
            $table->foreign('referral_user_id')->references('id')->on('users');
            $table->dropColumn('latitude');
            $table->dropColumn('longtitude');
            $table->float('user_latitude', 8, 2)->nullable();
            $table->float('user_longtitude', 8, 2)->nullable();
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
