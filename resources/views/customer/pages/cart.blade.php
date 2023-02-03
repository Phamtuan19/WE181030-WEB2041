`

@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/cart.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="div-fake" style="height: 62px"></div>

    <div class="container mt-4" id="container-cart">
        <form action="" method="">
            @csrf
            <div class="row">
                <div class="col-lg-9 pb-4">
                    {{-- danh sách giỏ hàng --}}
                    <div class="cart-detail" style="background-color: #fff; border-radius: 5px; padding: 0 6px 12px 6px;">
                        <h4 style="padding: 24px 0; text-align: center;">Thông tin sản phẩm</h4>
                        <table class="table">
                            <thead>
                                <tr style="font-size: 14px;">
                                    <th scope="col" width="100px">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col" width="50px"></th>
                                </tr>
                            </thead>
                            <tbody class="cart-table_body">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-cart">
                        <div class="cart-collaterals">
                            <div class="cart-collaterals_detail">
                                <div class="input-group discount-code">
                                    <input type="text" class="form-control discount-code_input" placeholder="Mã giảm giá"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn btn-secondary discount-code_btn" id="basic-addon2">Áp dụng</button>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <div class="cart-total_info">
                                <table class="cart-total">
                                    <tbody class="cart-total_body">
                                        <tr class="order-subtotal">
                                            <td class="cart-total-left">
                                                <label>Tổng phụ:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-money" value="0"
                                                    readonly style="border: none; text-align: end; padding: 3px 0;">
                                            </td>
                                        </tr>
                                        <tr class="order-subtotal-discount">
                                            <td class="cart-total-left cross-sell">
                                                <label>Mã giảm giá:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0;">
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td class="cart-total-left">
                                                <label>Tổng cộng:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-payment"
                                                    name="total_payment" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout-buttons">
                                <a href="{{ Auth::guard('customers')->check() ? route('store.payment') : route('customers.login') }}"
                                    class="btn btn-primary checkout-button">Tiến hành đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            const cartArr = JSON.parse(localStorage.getItem('cart'));

            if (cartArr != null) {
                function renderTable() {
                    const data = cartArr.map(function(e) {
                        return `
                    <tr style="vertical-align: middle;">
                        <td>
                            <img src="http://127.0.0.1:8000/${e.image}" alt="" style="width: 100%;">
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" value="${e.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="Dung lượng: 128GB" disabled style="border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="Màu sắc: RED" disabled style="border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
                            </div>
                            <a href="" style="color: #0066cc !important">Sửa</a>
                        </td>

                        <th style="font-size: 14px">${formatNumber(e.price, ',', '.')}</th>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" value="${e.quantity}" disabled style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
                            </div>
                        </td>
                        <td>
                            <i class="fa-solid fa-trash" style="color: #86868B"></i>
                        </td>
                    </tr>
                    `
                    });

                    $('.cart-table_body').html(data);
                }

                renderTable()
            }else {
                $("#container-cart").html(" <h1 class=\"container-cart_h1\">Không có sản phẩm nào trong giỏ hàng</h1> ");
            }

            // Hiển thị tổng số tiền
            $("input[name='total_payment']").val(renderTotalMoney());



            window.onload = function() {

                $('.edit_quantity').click(function() {

                    let code = $(this).data('code')
                    console.log(code);
                    addToCart(code);
                    renderTotalMoney(cartArr)
                });

                $('.remove_product').click(function() {
                    let code = $(this).data('code');

                    let cartArrr = JSON.parse(localStorage.getItem('cartArrr'));

                    const newCartArr = cartArr.filter(item => item.product_code != code)

                    localStorage.setItem('cart', JSON.stringify(newCartArr));

                    location.reload();
                });
            }
        })
    </script>
@endsection
