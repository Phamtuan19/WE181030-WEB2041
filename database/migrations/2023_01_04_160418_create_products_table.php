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
            $table->integer('import_price'); // giá nhập hàng
            $table->integer('price')->nullable(); // giá bán ra
            $table->integer('input_quantity'); // số lượng hàng nhập
            $table->integer('quantity_stock')->nullable(); // số lượng trong kho
            $table->integer('quantity_sold')->nullable(); // số lượng đã bán
            $table->text('information'); // thông tin sản phẩm
            $table->text('detail');
            $table->timestamps();
            $table->date('deleted_at')->nullable();

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
