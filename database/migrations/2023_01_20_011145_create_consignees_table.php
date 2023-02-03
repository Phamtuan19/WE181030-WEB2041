<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignees', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('order_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('province'); // tỉnh / thành phố
            $table->string('district'); // quận / huyện
            $table->string('ward'); // xã / phường
            $table->string('specific_address')->nullable(); // địa chỉ cụ thể
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
        Schema::dropIfExists('consignees');
    }
}
