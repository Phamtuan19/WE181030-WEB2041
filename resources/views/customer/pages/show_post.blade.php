@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/view_post.css') }}">
@endsection


@section('content-product')
    <div class="container">
        <div class="row">

            @foreach ($post->comments as $comment)
                <h2>{{ $comment->content }}</h2>
            @endforeach

            <div class="col-lg-12 mt-4">
                <div class="view_post">
                    {!! $post->content !!}
                </div>
            </div>

            <div class="col-lg-12  mb-4 ">
                <ul class="comment-list">
                    @foreach ($post->comments as $comment)
                        {{-- @dd($comment->customer->name) --}}
                        <li class="comment-item">
                            <div class="avatar">
                                <img src="https://dogstar.vn/wp-content/uploads/2022/05/anh-cho-husky-ngao.jpg"
                                    alt="" width="100%" style="border-radius: 50%">
                            </div>
                            <div class="comment">
                                {{-- @dd($comment->customer) --}}
                                {{ $comment->customer->name }}
                            </div>
                            <div class="meta">
                                {{ $comment->content }}
                            </div>
                            <div class="date_comment">
                                {{ date_format($comment->created_at, 'd/m/Y') }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>


            {{-- <ul class="comment-list">
                            <li class="comment-item">
                                <div class="avatar">
                                    <img src="https://dogstar.vn/wp-content/uploads/2022/05/anh-cho-husky-ngao.jpg" alt="" width="100%" style="border-radius: 50%">
                                </div>
                                <div class="comment">
                                    Your comment...
                                </div>
                                <div class="meta">
                                    few minutes ago... by Someone Else
                                </div>
                            </li>
                        </ul> --}}

            @if (Auth::guard('customers')->check())
                <div class="col-lg-8 offset-md-2 mb-4">
                    <form action="{{ route('store.comments.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            {{-- <label for="comment">Để lại bình luận của bạn: </label> --}}
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Viết bình luận của bạn ... ">nội dung comment
                            </textarea>
                            @error('comment')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="post" value="{{ $post->id }}">
                        </div>

                        <div class="col-lg-4 mt-4">
                            <input type="submit" class="btn btn-primary" value="Đăng bình luận">
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
