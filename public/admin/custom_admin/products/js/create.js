

// Render Images
function preview_images() {
    resetForm()
    var total_file = document.getElementById("images").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#image_preview').append(`
                  <div class='col-md-3'>
                      <img class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                  </div>`);
    }
}
function resetForm() {
    $("#image_preview").html("");
    return true;
}
