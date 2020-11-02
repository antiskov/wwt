<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('email_verification_code')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(0);
            $table->string('referral_code');
            $table->bigInteger('invited_by')->nullable();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->enum('sex',['man','woman'])->nullable();
            $table->date('birthday_date')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longtitude')->nullable();
            $table->string('specialisation')->nullable();
            $table->unsignedBigInteger('role_id')->default(0);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('timezone_id')->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
