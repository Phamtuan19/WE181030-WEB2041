

$('.admin_name').click(function() {
    $('.admin_name-dropdown').toggleClass("d-none")
});

$(document).ready(function () {

    $(".right-left_a").click(function () {
        $(".right-left_a").removeClass("active");
        $(this).addClass("active");
    });
});
