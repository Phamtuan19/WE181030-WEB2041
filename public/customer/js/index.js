

// =======================================
var swiper = new Swiper(".mySwiper-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// =======================================
document.addEventListener("DOMContentLoaded", function (event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function (e) {
    localStorage.setItem('scrollpos', window.scrollY);
};

// =======================================



function api() {

    // API các tỉnh thành việt nam
    $(document).ready(function () {
        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {
                    $("#province").append(
                        $("<option></option>")
                            .val(value.code + '-' + value.name)
                            .text(value.name)
                    );
                });
            }
        });

        $("#province").change(function () {

            const province = $(this).val().split("-");

            $("#specific_address").val(province[1])

            $("#district").empty();

            if ($(this).val() != null) {
                $("#district").prop("disabled", false);
            }

            if ($(this).val() == '') {
                $("#district").prop("disabled", true);
            }

            $.ajax({
                url: 'https://provinces.open-api.vn/api/p/' + province[0] + '?depth=2',
                type: 'GET',
                success: function (data) {
                    // console.table(data.districts);
                    $.each(data.districts, function (index, value) {
                        $("#district").append(
                            $("<option></option>")
                                .val(value.code + '-' + value.name)
                                .text(value.name)
                        );
                    });
                }
            });
        });


        $("#district").change(function () {

            const district = $(this).val().split("-");

            const province = $("#province").val().split("-");

            $("#specific_address").val(province[1] + ' - ' + district[1])

            console.log($("#specific_address").val());

            $("#ward").empty();

            if ($(this).val() != null) {
                $("#ward").prop("disabled", false);
            } else {
                $("#ward").prop("disabled", true);
            }

            $.ajax({
                url: 'https://provinces.open-api.vn/api/d/' + district[0] + '?depth=2',
                type: 'GET',
                success: function (data) {
                    console.log(data.wards);
                    $.each(data.wards, function (index, value) {
                        $("#ward").append(
                            $("<option></option>")
                                .val(value.name)
                                .text(value.name)
                        );
                    });
                }
            });

        });

        $("#ward").change(function () {
            if ($(this).val() != null) {
                $("#house_number").prop("disabled", false)
            }
            const province = $("#province").val().split("-");

            const district = $("#district").val().split("-");

            const ward = $(this).val();

            $("#specific_address").val(province[1] + '-' + district[1] + '-' + ward)
        })

        $("#house_number").keyup(function () {
            const province = $("#province").val().split("-");

            const district = $("#district").val().split("-");

            const ward = $("#ward").val();

            const house_number = $(this).val()

            $("#specific_address").val(province[1] + ' - ' + district[1] + ' - ' + ward + ' - ' + house_number)
        })

    });
}


// ===================================
