@if (request()->path() == 'store')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="single-feature">
                <a href="{{ route('store.show.posts', 8) }}" class="title">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <h3>
                        <p style="vertical-align: inherit;">
                            <p style="vertical-align: inherit;">Bảo hành</p>
                        </p>
                    </h3>
                </a>
                <p>
                    <p style="vertical-align: inherit;">
                        <p style="vertical-align: inherit;">Chính sách bảo hành</p>
                    </p>
                </p>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="single-feature">
                <a href="{{ route('store.show.posts', 9) }}" class="title">
                    <i class="fa-solid fa-truck-moving"></i>
                    <h3>
                        <p style="vertical-align: inherit;">
                            <p style="vertical-align: inherit;">Vận chuyển</p>
                        </p>
                    </h3>
                </a>
                <p>
                    <p style="vertical-align: inherit;">
                        <p style="vertical-align: inherit;">Giao hàng miễn phí</p>
                    </p>
                </p>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="single-feature">
                <a href="{{ route('store.show.posts', 10) }}" class="title">
                    <i class="fa-solid fa-headset"></i>
                    <h3>
                        <p style="vertical-align: inherit;">
                            <p style="vertical-align: inherit;">Hỗ trợ</p>
                        </p>
                    </h3>
                </a>
                <p>
                    <p style="vertical-align: inherit;">
                        <p style="vertical-align: inherit;">Chăm sóc khách hàng</p>
                    </p>
                </p>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="single-feature">
                <a href="{{ route('store.show.posts', 7) }}" class="title">
                    <i class="fa-solid fa-rotate"></i>
                    <h3>
                        <p style="vertical-align: inherit;">
                            <p style="vertical-align: inherit;">Đổi trả</p>
                        </p>
                    </h3>
                </a>
                <p>
                    <p style="vertical-align: inherit;">
                        <p style="vertical-align: inherit;">Chính sách đổi trả dễ dàng</p>
                    </p>
                </p>
            </div>
        </div>
    </div>
</div>
@endif
