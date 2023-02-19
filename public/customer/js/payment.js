const cartArr = JSON.parse(localStorage.getItem('cart'));

if (Array.isArray(cartArr)) {
    $('.cart-table_body').html(cartArr.map((e) => {
        return `
        <tr style="vertical-align: middle;">
            <td>
                <img src="${e.image}" alt="" style="width: 100%;">
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="product_code[${e.code}]" value="${e.code}" hidden style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                    <input type="text" class="form-control"  value="${e.name}" readonly style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                </div>
                <div class="form-group d-flex align-items-center">
                    <lable for="" style="flex: 1; color: #86868B; font-size: 14px">Bộ nhớ: </lable>
                    <input type="text" class="form-control" name="memory[${e.code}]" value="${e.memory}" readonly style="flex: 3; border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                </div>
                <div class="form-group d-flex align-items-center">
                    <lable for="" style="flex: 1; color: #86868B; font-size: 14px;">Màu sắc: </lable>
                    <input type="text" class="form-control" name="color[${e.code}]" value="${e.color}" readonly style="flex: 2.5; border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px; text-transform: capitalize;">
                </div>
                <a href="http://127.0.0.1:8000/store/detail-product/${e.code}" style="color: #0066cc !important">Sửa</a>
            </td>

            <td>
                <div class="form-group">
                    <input type="text" class="product_price" name="" value="${formatCurrency(e.price)}" readonly style="padding: 6px 10px; background-color: #f5f5f7; font-size: 14px;">
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity[${e.code}]" value="${e.quantity}" readonly style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
                </div>
            </td>
            <td>
                <i class="fa-solid fa-trash" style="color: #86868B"></i>
            </td>
        </tr>
        `
    }))

    let count = cartArr.length;
    $('quantity_product').val(count)
}

console.log(renderTotalMoney());
$('.total-payment').val(renderTotalMoney());


// redirect order success
$('.sucess-btn').click(function () {
    window.location.href = "http://127.0.0.1:8000/store";

    localStorage.removeItem('cart');
})

// Kiểm tra và chuyển hướng
if (cartArr == null) {
    window.history.back()
}




api();
