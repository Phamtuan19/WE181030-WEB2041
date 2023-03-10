@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/cart.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')

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
                                    <th scope="col" width="200px">Hình ảnh</th>
                                    <th scope="col" style="text-align: left !important;">Tên sản phẩm</th>
                                    <th scope="col" style="text-align: left !important;">Giá sản phẩm</th>
                                    <th scope="col" style="text-align: left !important;">Số lượng</th>
                                    <th scope="col" width="50px" style="text-align: left !important;"></th>
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
                                                    readonly style="border: none; text-align: end; padding: 3px 0;"
                                                    disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-subtotal-discount">
                                            <td class="cart-total-left cross-sell">
                                                <label>Mã giảm giá:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0;" disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td class="cart-total-left">
                                                <label>Tổng cộng:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-payment"
                                                    name="total_payment" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0;" disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout-buttons">
                                <a href="{{ Auth::guard('customers')->check() ? route('store.payment') : route('store.login') }}"
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
                                    <img src="${e.image}" alt="" style="width: 100%;">
                                </td>
                                <td style="text-align: left !important;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="${e.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="Dung lượng: 128GB" disabled style="border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="Màu sắc: RED" disabled style="border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
                                    </div>
                                    <a href="{{ url('store/detail-product/${e.code}') }}" style="color: #0066cc !important; ">Sửa</a>
                                </td>

                                <th style="font-size: 14px; text-align: left !important;">${formatCurrency(e.price)}</th>
                                <td>
                                    <div class="form-group">
                                        <input type="number" class="form-control edit_quantity" value="${e.quantity}" data-code="${e.code}" min="1" max="99" style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
                                    </div>
                                </td>
                                <td>
                                    <i class="fa-solid fa-trash remove_product" style="color: #86868B" data-code="${e.code}" ></i>
                                </td>
                            </tr>
                        `
                    });

                    $('.cart-table_body').html(data);
                }

                renderTable()
            } else {
                $("#container-cart").html(
                    " <h1 class=\"container-cart_h1\">Không có sản phẩm nào trong giỏ hàng</h1> ");
            }

            // Hiển thị tổng số tiền
            $("input[name='total_payment']").val(renderTotalMoney());

            $('.remove_product').click(function() {
                const code = $(this).data('code');

                const carArr = [];

                cart.forEach((e, index) => {
                    if (e.code != code) {
                        carArr.push(e);
                    }
                });

                console.log(carArr);

                localStorage.setItem('cart', JSON.stringify(carArr));

                location.reload();
            });
        })



        window.onload = function() {

            $('.edit_quantity').click(function() {

                const code = $(this).data('code')

                cart.forEach((e, index) => {
                    if (e.code == code) {
                       e.quantity = $(this).val();
                    }
                });

                localStorage.setItem('cart', JSON.stringify(cart));
                $('.total-payment').val(renderTotalMoney());
            });
        }
    </script>
@endsection
