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
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('house_number')->nullable();
            $table->string('specific_address')->nullable();
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('id');
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
