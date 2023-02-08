

$(document).ready(function () {
    $(".btn-delete").click(function () {
        $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/product/softErase/" + $(this).data("id"));
        console.log($("#form-modal").attr('action'));
    })

    $(".restore").click(function () {
        $("#form-modal").attr('action', "http://127.0.0.1:8000/admin/product/softErase/" + $(this).data("id"));
        console.log($("#form-modal").attr('action'));
    })
})
