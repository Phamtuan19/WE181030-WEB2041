<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('code_order');
            $table->integer('customer_id');
            $table->dateTime('date_order')->nullable(); // ngày yêu cầu tạo đơn hàng
            $table->dateTime('date_confirmation')->nullable(); // ngày xác nhận
            $table->dateTime('date_delivered')->nullable(); // ngày giao hàng
            $table->string('notes')->nullable(); // ghi chú
            $table->tinyInteger('order_statusID'); // trạng thái đơn hàng
            $table->boolean('payment_form'); // hình thức thanh toán
            $table->tinyInteger('quantity'); //
            $table->integer('total_money'); 
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
        Schema::dropIfExists('orders');
    }
}
