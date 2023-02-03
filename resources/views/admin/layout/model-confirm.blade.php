<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: red">Cảnh Báo</h5>
                <button type="button" class="btn-close" style="border: none; background-color: #fff"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>
            <div class="modal-body content-modal">
                <i class="fa-solid fa-circle-exclamation"></i>
                <p class="content-modal_title">
                    Xóa sản phẩm sẽ ảnh hướng tới dữ liệu !
                    <br>
                    Bạn chắc chắn muốn xóa ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                <form id="form-modal" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
