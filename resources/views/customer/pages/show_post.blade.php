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
                    @foreach ($arrComment as $comment)
                        {{-- @dd($comment->customer->name) --}}
                        <li class="comment-item">
                            <div class="avatar">
                                <img src="https://dogstar.vn/wp-content/uploads/2022/05/anh-cho-husky-ngao.jpg"
                                    alt="" width="100%" style="border-radius: 50%">
                            </div>
                            <div class="">
                                <div class="comment">
                                    {{-- @dd($comment->customer) --}}
                                    {{ $comment->customer->name }}
                                </div>
                                <div class="meta">
                                    {{ $comment->content }}
                                </div>
                                <div class="date_comment">
                                    {{ date_format($comment->created_at, 'd/m/Y') }}
                                    @if (Auth::guard('customers')->check())
                                        <small class="trl-comment" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $comment->id }}">Trả
                                            lời</small>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="exampleModalLabel" style="color: red">Trả lời bình luận của
                                <small></small>
                            </h5>
                            <button type="button" class="btn-close" style="border: none; background-color: #fff"
                                data-bs-dismiss="modal" aria-label="Close">
                                {{-- <i class="fa-regular fa-circle-xmark"></i> --}}
                            </button>
                        </div>
                        <form id="form-modal" action="" method="POST">
                            @csrf

                            <div class="modal-body content-modal">
                                <div class="form-group">
                                    <textarea class="form-control" id="comment_parent_id" name="comment_parent_id" rows="3"
                                        placeholder="Viết bình luận của bạn ... "></textarea>
                                    @error('comment_parent_id')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                    <input type="hidden" name="parent_id" class="parent_id" value="">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-success">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
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

@section('js')
    <script src="{{ asset('customer/js/show_post.js') }}"></script>
@endsection
