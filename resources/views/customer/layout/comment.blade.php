

<div class="container mt-4">


    <div class="row">

        @if (Auth::guard('customers')->check())
            @if ($commentType == 'posts')
                <div class="card-title">
                    <h3 class="h5 heading">Hỏi &amp; Đáp</h3>
                </div>
                <div class="card-body">
                    <div class="user-form">
                        <form action="{{ route('store.comments.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="commentType" value="{{ $commentType }}">
                            <div class="form-group">
                                <textarea id="comment" name="comment" class="form-control" rows="3"
                                    placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..." style="padding-right: 200px;"></textarea>

                                @error('comment')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror

                                <input type="hidden" name="post" value="{{ $post->id }}">

                                <button type="submit" class="btn btn-primary btn-lg btn-bl">GỬI BÌNH LUẬN</button>
                            </div>
                        </form>
                    </div>
                </div>
            @elseif ($commentType == 'product')
                <div class="card-title">
                    <h3 class="h5 heading">Hỏi &amp; Đáp</h3>
                </div>
                <div class="card-body">
                    <div class="user-form">
                        <form action="{{ route('store.comments.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="commentType" value="{{ $commentType }}">

                            <div class="form-group">
                                <textarea id="comment" name="comment" class="form-control" rows="3"
                                    placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..." style="padding-right: 200px;"></textarea>

                                @error('comment')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror

                                <input type="hidden" name="product" value="{{ $product->id }}">

                                <button type="submit" class="btn btn-primary btn-lg btn-bl">GỬI BÌNH LUẬN</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endif


        @if ($comments->count() > 0)
            <div class="col-lg-12 mb-4 p-3">

                @foreach ($comments as $comment)
                    <div class="comment mb-4">
                        <div class="comment-image_user">
                            <img class="image_user"
                                src="https://i.pinimg.com/736x/ff/ea/3c/ffea3c75cab666941ebc1477c600d229.jpg"
                                alt="">
                        </div>
                        <div class="comment-meta">
                            <div class="comment-user_name">
                                {{ $comment->users->username }}
                            </div>
                            <div class="content">
                                {{ $comment->content }}
                            </div>
                            <div class="comment-time_reply">
                                <span class="comment-time">
                                    {{ $comment->created_at }}
                                </span>
                                <a class="comment-reply" href="javascript::voi(0);" onclick="reply(this)"
                                    data-commentID="{{ $comment->id }}">Trả lời</a>
                            </div>
                        </div>
                    </div>

                    @if (!empty($comment->children))
                        @foreach ($comment->children as $children)

                            <div class="comment comment-parent mb-4">
                                <div class="comment-image_user">
                                    <img class="image_user"
                                        src="https://i.pinimg.com/736x/ff/ea/3c/ffea3c75cab666941ebc1477c600d229.jpg"
                                        alt="">
                                </div>
                                <div class="comment-meta">
                                    <div class="comment-user_name">
                                        {{ $children->users->username }}
                                    </div>
                                    <div class="content">
                                        {{ $children->content }}
                                    </div>
                                    <div class="comment-time_reply">
                                        <span class="comment-time">
                                            {{ $children->created_at }}
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
                            style="width: 500px; height: 100px; border-radius: 10px; padding: 12px"></textarea>
                        <br>

                        <button type="submit" class="btn btn-primary">Đăng</button>
                        <a href="javascript::void(0)" class="btn btn-danger" onclick="closeReply(this)">Hủy</a>
                    </form>
                </div>

            </div>
        @else
            <p class="no-comments">Không có bình luận nào về sản phẩm</p>
        @endif

    </div>

</div>
