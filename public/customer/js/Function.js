
let localCart = localStorage.getItem('cart');
let cart = []
if (localCart) {
    cart = JSON.parse(localCart);
    renderCart_(cart)
    render_Cart_product(cart);
}

/* ================== Add to carts =================== */
// thêm sản phẩm vào giỏ hàng
function addToCart(dataCode, image, price, name, color, memory) {

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
    render_Cart_product(cart);
};


// /* ================== Update the quantity of products in the cart =================== */

// hiển thị số lượng sản phẩm trong giỏ hàng
function renderCart_(cartArr) {
    if (Array.isArray(cartArr)) {
        const amount = cartArr.length;

        $('.cart_total').html(amount);
        $('.cart-title_total').html(amount);
    }
}

// Navbar hiển thị sản phẩm
function render_Cart_product(cartArr) {
    const renderCart = cartArr.map(function (value) {
        return `
            <li class="cart-item">
                <img src="${value.image}"
                    alt="" class="cart-link_image">

                <a href="" class="cart-link cart-link_name">
                    <span class="cart-name">Samsung Galaxy Tab S6 Lite 2022</span>
                </a>

                <span class="cart-link cart-link_quantity">1</span>

            </li>
        `
        });

    $('.dropdown-items').html(renderCart)
}

// /* ================== Total Money =================== */


// Hiển thị tổng tiền trong giỏ hàng
function renderTotalMoney() {
    const cartArr = JSON.parse(localStorage.getItem('cart'));
    let total = 0;

    if (cartArr != null) {
        cartArr.forEach((e) => {
            total += e.quantity * e.price
        })
    }

    return formatCurrency(total);
}
// /* ================== Total Money =================== */

// định dạng tiền trong js
function formatCurrency(money){
    let formattedMoney = money.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
    return formattedMoney;
}
