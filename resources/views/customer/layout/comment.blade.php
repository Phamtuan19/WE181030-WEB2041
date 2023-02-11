{{-- style="background-color: #F8F9FA" --}}
<div class="container mt-4">
    <div class="row">
        <h1 style="text-align: center; margin-bottom:  1.5rem">Comments</h1>

        @if (Auth::guard('customers')->check())
            @if ($commentType == 'posts')
                <div class="col-lg-8 offset-md-2 mb-4">
                    <form action="{{ route('store.comments.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="commentType" value="{{ $commentType }}">
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Viết bình luận của bạn ... ">nội dung comment</textarea>
                            @error('comment')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="post" value="{{ $post->id }}">
                        </div>

                        <div class="mt-4" style="text-align: center">
                            <input type="submit" class="btn btn-primary " value="Đăng bình luận">
                        </div>
                    </form>
                </div>
            @elseif ($commentType == 'product')
                <div class="col-lg-8 offset-md-2 mb-4">
                    <form action="{{ route('store.comments.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="commentType" value="{{ $commentType }}">
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Viết bình luận của bạn ... ">nội dung comment</textarea>
                            @error('comment')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="product" value="{{ $product->id }}">
                        </div>

                        <div class="mt-4" style="text-align: center">
                            <input type="submit" class="btn btn-primary " value="Đăng bình luận">
                        </div>
                    </form>
                </div>
            @endif
        @endif

        @if ($comments->count() > 0)
            <div class="col-lg-8 offset-md-2 mb-4 p-3">

                @foreach ($comments as $comment)
                    <div class="comment mb-4">
                        <div class="comment-image_user">
                            <img class="image_user"
                                src="https://i.pinimg.com/736x/ff/ea/3c/ffea3c75cab666941ebc1477c600d229.jpg"
                                alt="">
                        </div>
                        <div class="comment-meta">
                            <div class="comment-user_name">
                                {{ $comment->userComment->username }}
                            </div>
                            <div class="content">
                                {{ $comment->content }}
                            </div>
                            <div class="comment-time_reply">
                                <span class="comment-time">
                                    {{ date_format($comment->created_at, 'd-m-Y') }}
                                </span>
                                <a class="comment-reply" href="javascript::voi(0);" onclick="reply(this)"
                                    data-commentID="{{ $comment->id }}">Trả lời</a>
                            </div>
                        </div>
                    </div>

                    {{-- @dd(!empty($comment->parent)) --}}
                    @if (!empty($comment->parent))
                        @foreach ($comment->parent as $parent)
                            <div class="comment comment-parent mb-4">
                                <div class="comment-image_user">
                                    <img class="image_user"
                                        src="https://i.pinimg.com/736x/ff/ea/3c/ffea3c75cab666941ebc1477c600d229.jpg"
                                        alt="">
                                </div>
                                <div class="comment-meta">
                                    <div class="comment-user_name">
                                        {{ $parent->userComment->username }}
                                    </div>
                                    <div class="content">
                                        {{ $parent->content }}
                                    </div>
                                    <div class="comment-time_reply">
                                        <span class="comment-time">
                                            {{ date_format($parent->created_at, 'd-m-Y') }}
                                        </span>
                                        <a class="comment-reply" href="javascript::void(0)" onclick="reply(this)"
                                            data-commentID="{{ $comment->id }}">Trả
                                            lời</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach



                <div class="replyComment" style="display: none;">
                    <form action="{{ route('store.comments.reply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="commentId" id="commentId">
                        <input type="hidden" name="commentType" value="{{ $commentType }}">
                        <textarea name="comment" id="" placeholder="Nhập vào bình luận của bạn"
                            style="width: 500px; height: 100px; border-radius: 10px"></textarea>
                        <br>

                        <button type="submit" class="btn btn-primary">Đăng</button>
                        <a href="javascript::void(0)" class="btn btn-danger" onclick="closeReply(this)">Hủy</a>
                    </form>
                </div>

            </div>
        @endif

    </div>
</div>
