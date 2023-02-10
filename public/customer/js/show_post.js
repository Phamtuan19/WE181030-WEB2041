

console.log($(".trl-comment"));

$(".trl-comment").click(function () {
    $("#form-modal").attr('action', "http://127.0.0.1:8000/store/comments/reply/" + $(this).data("id"));
    // const customer_id = $(this).data("customer")
    // $(".parent_id").val(customer_id);
    console.log($("#form-modal").attr('action'));
});
