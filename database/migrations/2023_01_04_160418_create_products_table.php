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
            $table->string('name', 255)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('import_price')->nullable(); // giá nhập hàng
            $table->integer('price')->nullable(); // giá bán ra
            $table->integer('input_quantity'); // số lượng hàng nhập
            $table->integer('quantity_stock')->nullable(); // số lượng trong kho
            $table->integer('quantity_sold')->nullable(); // số lượng đã bán
            $table->text('information')->nullable(); // thông tin sản phẩm
            $table->text('detail')->nullable();
            $table->timestamps();
            $table->date('deleted_at')->nullable();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands');
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
