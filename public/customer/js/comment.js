

function reply (caller) {
    document.getElementById("commentId").value = $(caller).attr('data-commentID');
    $(".replyComment").insertAfter($(caller));
    $(".replyComment").show();
}

function closeReply (caller) {
    $(".replyComment").hide();
}
