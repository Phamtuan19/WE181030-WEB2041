<div class="col-lg-12 filter-product">

    <div class="mt-2">
        <p class="filter-title mb-2">Hãng sản xuất</p>

        <div class="px-3">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="?category=phu-kien&category-children=&brand=&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link_a {!! request()->brand == '' ? 'filter-active' : '' !!}">Tất cả</a>
                </li>

                @if (request()->category == 'phu-kien')
                    @foreach ($accessoryBrand as $key => $brand)
                        <li class="nav-item">
                            <a class="nav-link nav-link_a {!! request()->brand == $brand->name ? 'filter-active' : '' !!}" aria-current="page"
                                href="?category=phu-kien&category-children={{ $brand->name }}&brand={{ $brand->name }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">{{ $brand->name }}</a>
                        </li>
                    @endforeach
                @else
                    @foreach ($brands as $key => $brand)
                        <li class="nav-item">
                            <a class="nav-link nav-link_a {!! request()->brand == $brand->name ? 'filter-active' : '' !!}" aria-current="page"
                                href="?category=phu-kien&category-children={{ $brand->name }}&brand={{ $brand->name }}&price={{ request()->price }}&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}">{{ $brand->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    {{-- </form> --}}

    <div class="mt-4">
        <p class="filter-title mb-2">Mức Giá</p>

        <div class="px-3">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- @dd(request()->path()) --}}
                <li class="nav-item ">
                    <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link nav-link_a {!! request()->price == '' ? 'filter-active' : false !!}">Tất
                        cả</a>
                </li>

                <li class="nav-item">
                    <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=duoi-3-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link nav-link_a {!! request()->price == 'duoi-3-trieu' ? 'filter-active' : '' !!}">Dưới 3 triệu</a>
                </li>

                <li class="nav-item">
                    <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tu-3-8-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link nav-link_a {!! request()->price == 'tu-3-8-trieu' ? 'filter-active' : '' !!}">Từ 3 - 8 triệu</a>
                </li>

                <li class="nav-item">
                    <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tu-8-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link nav-link_a {!! request()->price == 'tu-8-15-trieu' ? 'filter-active' : '' !!}">Từ 8 -15 triệu</a>
                </li>

                <li class="nav-item">
                    <a href="?category={{ request()->category }}&brand={{ request()->brand }}&price=tren-15-trieu&orderType={{ request()->orderType }}&orderBy={{ request()->orderBy }}"
                        class="nav-link nav-link_a {!! request()->price == 'tren-15-trieu' ? 'filter-active' : '' !!}">Trên 15 triệu</a>
                </li>

            </ul>
        </div>
    </div>

</div>
