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
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->tinyInteger('position_id')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('province')->nullable(); // tỉnh
            $table->string('district')->nullable(); // huyện
            $table->string('ward')->nullable(); // xã
            $table->string('specific_address')->nullable(); // địa chỉ cụ thể
            $table->boolean('is_active')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
