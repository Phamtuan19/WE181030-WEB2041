

//
let local_Cart = JSON.parse(localStorage.getItem('cart'));


/* ================== Add to carts =================== */
function addToCart(dataCode, price) {
    // const addToCart = document.querySelector(".addToCart")
    let cart = [];

    // const dataCode = e.target.dataset.code;

    const localCart = localStorage.getItem('cart');
    if (localCart) {
        cart = JSON.parse(localCart);
    }

    const item = cart.find(item => item.product_code === dataCode)
    // console.log(item);
    if (item) {
        item.quantity += 1;
    } else {

        cart.push({ product_code: dataCode, price: price, quantity: 1 })
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    renderTotal();
    renderTotals()
}


/* ================== Update the number of products in the cart =================== */

function renderTotal() {
    const cartArr = JSON.parse(localStorage.getItem('cart'));
    let amount = 0;
    if (cartArr) {
        amount = cartArr.length;
    }
    document.querySelector('.cart_quantity').innerHTML = amount;
    $('.dropdown-count_strong').html(amount + " mục")
};

renderTotal();

/* ================== Update the number of products in the cart =================== */
function updateItemCart(productCode, quantity, cartName = '') {
    local_Cart.forEach((e) => {
        if (e.product_code === productCode) {
            e.quantity = quantity
        }
    })

    localStorage.setItem(cartName, JSON.stringify(local_Cart));
}

/* ================== Remove product item in cart =================== */
function removeItemCart(product_code, cartname = '') {
    let carts = [];
    if (local_Cart.length > 1) {
        local_Cart.forEach((e) => {
            if (e.product_code != product_code) {
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
function formatNumber(nStr, decSeperate, groupSeperate) {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2') ;
    }
    return x1 + x2 + ' VND';
}


/* ================== Render Totals =================== */
function renderTotals() {
    let localCart = JSON.parse(localStorage.getItem('cart'))
    let amount = 0;
    localCart.forEach(function(e) {
        amount += e.price * e.quantity;
    })
    $(".total-payment").val(formatNumber(amount, ',', '.'));
    $(".total-money").val(formatNumber(amount, ',', '.'))
    console.log(amount);
}
