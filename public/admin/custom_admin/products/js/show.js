

$(document).ready(function () {

    let delete_image = function () {
        return `
            <div class="content-modal_info">
                <div class="modal-body content-modal" style="text-align: center">
                    <img src="https://img.icons8.com/flat-round/256/question-mark.png" alt="" width="72px">
                    <p class="content-modal_title">
                        Chọn chọn làm ảnh đại điện
                        <br>
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </div>
        `;
    }

    let Change_image = function () {
        return `
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Hình ảnh mới:</label>
                    <input type="file" class="form-control" id="recipient-name" name="image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        `;
    }

    let choose_avatar = function () {
        return `
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Chọn ảnh đại diện:</label>
                    <input type="text" class="form-control" id="recipient-name" name="is_avatar" value="1" hidden>
                </div>
                <div style="text-align: center">
                    <i class="fa-solid fa-circle-check" style="font-size: 50px; color: #00FF00"></i>

                    <p class="mt-3" style="color: #007bff">Xác nhận chọn ảnh làm ảnh đại diện sản phẩm</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-success">Xác nhận</button>
            </div>
        `;
    }

    $(".delete_image").click(function () {
        $(".modal-content").html(delete_image);
        $(".form_edit_img").attr('action', 'http://127.0.0.1:8000/admin/images/' + $(this).data(
            'id'));
        console.log($(".form-method").val());
        $(".form-method").val("DELETE");
        console.log($(".form_edit_img").attr('action'));

    })

    $(".Change_image").click(function () {
        $(".modal-content").html(Change_image);
        $(".form_edit_img").attr('action', 'http://127.0.0.1:8000/admin/images/' + $(this).data(
            'id'));
        console.log($(".form_edit_img").attr('action'));
        console.log($(".form-method").val());
        $(".form-method").val("PATCH")
    })

    $(".choose_avatar").click(function () {
        $(".modal-content").html(choose_avatar);
        $(".form_edit_img").attr('action', 'http://127.0.0.1:8000/admin/images/avatar/' + $(this)
            .data('id'));
        console.log($(".form_edit_img").attr('action'));
        console.log($(".form-method").val());
        $(".form-method").val("PATCH")
    })

})
