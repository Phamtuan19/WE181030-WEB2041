<div class="col-lg-12 filter-product">

    <div class="mt-2">
        @if (request()->category == 'phu-kien')
            <p class="filter-title mb-2">Loại sản phẩm</p>
        @else
            <p class="filter-title mb-2">Hãng sản xuất</p>
        @endif

        <div class="px-3">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="row">

                    @if (request()->category == 'phu-kien')
                        <li class="nav-item">
                            <a href="?category=phu-kien&productType=tat-ca&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                class="nav-link_a {!! request()->productType == 'tat-ca' ? 'filter-active' : '' !!}">Tất cả</a>
                        </li>
                        @foreach ($accessoryCtegory as $key => $category)
                            <li class="nav-item">
                                <a class="nav-link nav-link_a {!! request()->productType == $category->slug ? 'filter-active' : '' !!}" aria-current="page"
                                    href="?category=phu-kien&productType={{ $category->slug }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @else
                        <li class="nav-item">
                            <a href="?category=dien-thoai&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                                class="nav-link_a {!! request()->brand == '' ? 'filter-active' : '' !!}">Tất cả</a>
                        </li>
                        @foreach ($brands as $key => $brand)
                            <div class="col-lg-6">
                                <li class="nav-item">
                                    <a class="nav-link nav-link_a {!! request()->brand == $brand->name ? 'filter-active' : '' !!}" aria-current="page"
                                        href="?category={{ request()->category }}&brand={{ $brand->name }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">{{ $brand->name }}</a>
                                </li>
                            </div>
                        @endforeach
                    @endif
                </div>
            </ul>
        </div>
    </div>
    {{-- </form> --}}

    <div class="mt-4">
        <p class="filter-title mb-2">Mức Giá</p>

        <div class="px-3">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (isset(request()->productType))
                    <li class="nav-item ">
                        <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price=&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                            class="nav-link nav-link_a {!! request()->price == '' ? 'filter-active' : false !!}">Tất
                            cả</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price=duoi-3-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                            class="nav-link nav-link_a {!! request()->price == 'duoi-3-trieu' ? 'filter-active' : '' !!}">Dưới 3 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price=tu-3-8-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                            class="nav-link nav-link_a {!! request()->price == 'tu-3-8-trieu' ? 'filter-active' : '' !!}">Từ 3 - 8 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price=tu-8-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                            class="nav-link nav-link_a {!! request()->price == 'tu-8-15-trieu' ? 'filter-active' : '' !!}">Từ 8 -15 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&productType={{ request()->productType }}&price=tren-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                            class="nav-link nav-link_a {!! request()->price == 'tren-15-trieu' ? 'filter-active' : '' !!}">Trên 15 triệu</a>
                    </li>
                @else
                    <li class="nav-item ">
                        <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=&orderBy={{ request()->orderBy }}&orderType={{ request()->orderType }}"
                            class="nav-link nav-link_a {!! request()->price == '' ? 'filter-active' : false !!}">Tất
                            cả</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=duoi-3-trieu&orderBy={{ request()->orderBy }}&orderType={{ request()->orderType }}"
                            class="nav-link nav-link_a {!! request()->price == 'duoi-3-trieu' ? 'filter-active' : '' !!}">Dưới 3 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tu-3-8-trieu&orderBy={{ request()->orderBy }}&orderType={{ request()->orderType }}"
                            class="nav-link nav-link_a {!! request()->price == 'tu-3-8-trieu' ? 'filter-active' : '' !!}">Từ 3 - 8 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tu-8-15-trieu&orderBy={{ request()->orderBy }}&orderType={{ request()->orderType }}"
                            class="nav-link nav-link_a {!! request()->price == 'tu-8-15-trieu' ? 'filter-active' : '' !!}">Từ 8 -15 triệu</a>
                    </li>

                    <li class="nav-item">
                        <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tren-15-trieu&orderBy={{ request()->orderBy }}&orderType={{ request()->orderType }}"
                            class="nav-link nav-link_a {!! request()->price == 'tren-15-trieu' ? 'filter-active' : '' !!}">Trên 15 triệu</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

</div>
