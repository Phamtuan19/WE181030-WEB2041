


/* ================== Add to carts =================== */
function addToCart(dataCode, image, price, name, color, memory) {

    let cart = [];

    const localCart = localStorage.getItem('cart');
    if (localCart) {
        cart = JSON.parse(localCart);
    }

    const item = cart.find(item => item.code === dataCode)
    // console.log(item);
    if (item) {
        item.color = color;
        item.memory = memory;
    } else {

        cart.push({
            code: dataCode,
            name: name,
            price: price,
            image: image,
            color: color,
            memory: memory,
            quantity: 1
        })
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    renderCart_(cart);
};


/* ================== Update the number of products in the cart =================== */
function renderCart_(cartArr) {
    if (Array.isArray(cartArr)) {
        const amount = cartArr.length;

        $('.quantity-cart').html(amount);
        $('.dropdown-count_strong').html(amount);

        let totalMoney = 0;
        cartArr.forEach(function (item, index) {
            totalMoney += item.quantity * item.price
        });

        $(".total_money").html(totalMoney)

        render_Cart_product(cartArr);

    }
}

function render_Cart_product(cartArr) {
    const renderCart = cartArr.map(function (value) {
        return `
        <div class="dro-item">
            <div class="item-picture">

                    <img src="http://127.0.0.1:8000/${value.image}" alt="" class="dro-item_img" style="width: 100%">

            </div>
            <div class="item-product">
                <div class="item-product_name">
                    <a href="#"></a>
                </div>
                <div class="item-product_price">
                    Đơn giá: <span>${value.price}đ</span>
                </div>
                <div class="item-product_quantity">
                    Số lượng: <span>${value.quantity}</span>
                </div>
            </div>
        </div>
    `
    });

    $('.dropdown-items').html(renderCart)
}

/* ================== Total Money =================== */
function renderTotalMoney() {
    const cartArr = JSON.parse(localStorage.getItem('cart'));
    let total = 0;

    if (cartArr != null) {
        cartArr.forEach((e) => {
            total += e.quantity * e.price
        })
    }

    return total
}
/* ================== Total Money =================== */

/* ================== Update the number of products in the cart =================== */
function updateItemCart(productCode, quantity, cartName = '') {
    local_Cart.forEach((e) => {
        if (e.code === productCode) {
            e.quantity = quantity
        }
    })
}

/* ================== Remove product item in cart =================== */
function removeItemCart(product_code, cartname = '') {
    let carts = [];
    if (local_Cart.length > 1) {
        local_Cart.forEach((e) => {
            if (e.code != product_code) {
                carts.push(e);
            }
        })
        localStorage.setItem(cartname, JSON.stringify(carts));
    } else {
        localStorage.clear();
    }

    location.reload(true);
}

/* ================== Format money =================== */
function formatNumber(number) {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(parseFloat(number));
}
console.log(formatNumber(1000))

/* ================== Render Totals =================== */
function renderTotals() {
    let localCart = JSON.parse(localStorage.getItem('cart'))
    let amount = 0;
    localCart.forEach(function (e) {
        amount += e.price * e.quantity;
    })
    $(".total-payment").val(formatNumber(amount, ',', '.'));
    $(".total-money").val(formatNumber(amount, ',', '.'))
    console.log(amount);
}


/* ================== Customer =================== */
$(".customer_name").click(function () {
    $(".admin_name-dropdown").toggleClass('d-none');
})
