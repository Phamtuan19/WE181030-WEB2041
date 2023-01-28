@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/cart.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="div-fake" style="height: 62px"></div>

    <div class="container mt-4">
        <form action="" method="">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    {{-- danh sách giỏ hàng --}}
                    <div class="carts-detail">
                        <div class="table-wrapper">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col" width="150px">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá Tiền</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col" width="70px"></th>
                                    </tr>
                                </thead>
                                <tbody class="cart-table_body">
                                    {{-- render Ajax --}}
                                </tbody>
                            </table>
                        </div>
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
                                        {{-- <tr class="tax-value">
                                            <td class="cart-total-left">
                                                <label>Thuế:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <span class="value-summary">0₫</span>
                                            </td>
                                        </tr> --}}
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

            function renderTable(data, carts) {
                const tbale_body = data.map(function(item, index) {
                    return `
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>
                            <div class="detail-image">
                                <a href="#" class="detail-image_link">
                                    <img src="	http://127.0.0.1:8000/${item.avatar}"
                                        alt="" class="detail_img">
                                </a>
                            </div>
                        </td>
                        <td>
                            <a href="#">${item.name}</a>
                        </td>
                        <td>${formatNumber(item.price, '.', '.')}</td>
                        <td>
                            <div class="input-group justify-content-center ">
                                <input type="number" id="abc" class="form-control quantity" value="${carts[index].quantity}" min="1" max="99" data-code="${item.code}"
                                    aria-describedby="basic-addon1" style="width: 60px">
                            </div>
                        </td>
                        <td>
                            <p class="remove_product" data-code="${item.code}"><i class="fa-solid fa-trash"></i></p>
                        </td>
                    </tr>
                    `
                })

                $('.cart-table_body').html(tbale_body);
            }

            /* ================== Render products in the cart =================== */
            function renderTableCart() {
                const localCart = JSON.parse(localStorage.getItem('cart'))
                if (localCart) {
                    codeArr = []
                    localCart.forEach(function(e) {
                        codeArr.push(e.product_code)
                    })
                    renderTotals(localCart)

                    $.ajax({
                        url: "{{ route('cart') }}?product_code=" + codeArr.join(','),
                        type: 'GET',
                        // success: (data) => renderTable(data, localCart)
                    }).done(function(data) {
                        renderTable(data, localCart);
                        console.log(data);
                    })

                } else {
                    console.log('faild');
                }
            }

            renderTableCart()

            window.onload = () => {

                /* ================== Update the number of products in the cart =================== */
                $(".quantity").change(function() {
                    const productCode = $(this).data('code');
                    const productQuantity = $(this).val();
                    updateItemCart(productCode, productQuantity, 'cart')
                    renderTotals()
                })

                /* ================== Delete the number of products in the cart =================== */
                $(".remove_product").click(function() {
                    removeItemCart($(this).data('code'), 'cart');
                    renderTotal()
                    renderTotals()
                })
            }

        })
    </script>
@endsection
