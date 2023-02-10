@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/post.css') }}">
@endsection

@section('content-product')
    <div class="container my-5">
        <h1 class="text-center">Danh sách bài viết</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-8 offset-md-2">
                    <div class="news__item">
                        <a href="{{ route('store.show.posts', $post->id) }}" class="news__item__img">
                            <img src="{{ $post->avatar_path }}"
                                alt="{{ $post->title }}">
                        </a>
                        <div class="news-item__info">
                            <a class="news__item__cate" href="{{ route('store.show.posts', $post->id) }}">{{ $post->title }}</a>
                            <a href="{{ route('store.show.posts', $post->id) }}">
                                <h3 class="news__item__tit">Top 6 món quà tặng ngày Valentine cho chồng và bạn trai ý nghĩa
                                    nhất 2023</h3>
                            </a>
                            <div class="news__item__text">

                            </div>
                            <p class="news__item__user">
                                {{-- <span>
                                    <img src="https://images.fpt.shop/unsafe/30x30/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/10/26/638023799944535285_z3830051132221_1a7b17b73a31298fe82169e7c119db8b.jpg"
                                        alt="">
                                </span> --}}
                                <span>{{ $post->user->username }}</span>
                                <span>-</span>
                                <span>
                                    <time datetime="{{ $post->created_at }}" title="">
                                        {{ date_format($post->created_at, 'd/m/Y') }}
                                    </time>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
