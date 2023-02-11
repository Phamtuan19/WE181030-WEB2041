

/* ================== Slider =================== */
var swiper = new Swiper(".mySwiper2", {
    spaceBetween: 5,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper", {
    spaceBetween: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

$(document).ready(function() {


    // active memory and color
    $(window).load(function() {
        $(".option-list .form-group:first-child .attribute-memory_label").addClass("active");
        $(".title-memory").html($(".option-list .form-group:first-child .attribute-memory_label").html())

        $(".option-list .form-group:first-child .attribute-color_label").addClass("active");
        $(".title-color").html($(".option-list .form-group:first-child .attribute-color_label").data("color"))
    });

    // Click active memory and color
    $(".attribute-memory_label").click(function() {

        $(".title-memory").html($(this).html())

        $(".attribute-memory_label").removeClass("active")

        $(this).addClass("active")
    })

    $('.attribute-color_label').click(function() {
        $(".title-color").html($(this).data("color"))

        $(".attribute-color_label").removeClass("active")

        $(this).toggleClass('active')
    })


    // Order cart
    $('.order-add').click(function() {
        console.log();
        let code = $(".order-add").data("code");
        let image = $(".product_img").data("image");
        let price = $(".price_sale").data("price");
        let name = $(".product_name").data("name");
        let color = $(".title-color").html();
        let memory = $(".title-memory").html();

        console.log(memory, name, color, price, image, code);

        addToCart(code, image, price, name, color, memory);
    });

});
