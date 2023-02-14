@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/view_post.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/comment.css') }}">
@endsection


@section('content-product')
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mt-4" style="">
                <div class="view_post" style="background-color: #FFF; padding: 24px; border-radius: 5px; ">

                    <div class="heading" style="margin-bottom: 24px">
                        <div class="heading-title mb-3">
                            <h2>{!! $post->title !!}</h2>
                        </div>
                        <div class="post__user border-bottom">
                            <span class="author-avatar">
                                <img
                                    src="https://images.fpt.shop/unsafe/72x72/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/4/24/637233405057308536_hong-leo.jpg">
                            </span>
                            <div>
                                <span class="author-name">{{ $post->user->username }}</span>
                                <div class="author-info">
                                    <span class="post-time">{{ date_format($post->created_at, 'd-m-Y') }}</span>
                                    <a class="post-cmt" href="#root-comment">
                                        <i class="fa-regular fa-message"></i>
                                        <span
                                            id="totalCmt">{{ $post->comments->count() }}
                                        </span>
                                        <span> Hỏi &amp; Đáp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content" >
                        {!! $post->content !!}
                    </div>
                    <hr>
                </div>
                <div class="comment" style="background-color: #FFF; padding: 24px; border-radius: 5px; ">
                    @include('customer.layout.comment')
                </div>
            </div>


        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('customer/js/comment.js') }}"></script>
@endsection
