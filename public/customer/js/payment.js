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
                    <input type="text" class="product_price" name="" value="${e.price}" readonly style="padding: 6px 10px; background-color: #f5f5f7; font-size: 14px;">
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

if (cartArr == null) {
    window.history.back()
}



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

        // console.log([$(this)]);
        // $("#province")[0].dataset.provice = "1"

        const province = $(this).val().split("-");

        // console.log(province[1]);

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

    $("#ward").change(function(){
        if($(this).val() != null) {
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
