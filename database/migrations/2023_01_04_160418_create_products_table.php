<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('price');
            $table->integer('sale')->nullable();
            $table->integer('quantity');
            $table->string('color');
            $table->text('avatar');
            $table->text('image');
            $table->text('title');
            $table->text('detail');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('category');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
