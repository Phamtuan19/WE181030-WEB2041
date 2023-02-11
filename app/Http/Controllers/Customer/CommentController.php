<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Models\Comment;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the Comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new Comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'comment' => 'required',
            ],
            [
                'comment.required' => 'Bạn chưa viết bình luận',
            ]
        );


        if ($request->commentType == "posts") {
            // dd(Auth::guard('customers')->id());
            $comments = new Comment();
            $data = [
                'post_id' => $request->post,
                'user_id' => Auth::guard('customers')->id(),
                'content' => trim($request->comment),
                'timestamps' => date('Y-m-d H:i:s'),
            ];

            if ($comments->create($data)) {
                return back()->with('msg', 'đăng bài viết thành công');
            }

            return back();
        }

        if($request->commentType == "product") {

            $comments = new Comment();

            $data = [
                'product_id' => $request->product,
                'user_id' => Auth::guard('customers')->id(),
                'content' => trim($request->comment),
                'timestamps' => date('Y-m-d H:i:s'),
            ];

            $comments->create($data);
            return back();
        }
    }

    /**
     * Display the specified Comment.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified Comment.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $Comment)
    {
        //
    }

    /**
     * Update the specified Comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $Comment)
    {
        //
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @param  \App\Models\Comment  $Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $Comment)
    {
        //
    }


    public function reply(Request $request)
    {

        // dd($request->all());
        $request->validate(
            [
                'comment' => 'required',
            ],
            [
                'comment.required' => 'Bạn chưa viết bình luận',
            ]
        );

        $comments = new Comment();

        $comment = $comments->find($request->commentId);

        if ($request->commentType == "posts") {

            $dataReply = [
                'post_id' => $comment->post_id,
                'user_id' => Auth::guard('customers')->id(),
                'parent_id' => $request->commentId,
                'content' => $request->comment,
            ];

            $comments->create($dataReply);
            return back();
        }

        if ($request->commentType == "product") {

            $dataReply = [
                'product_id' => $comment->product_id,
                'user_id' => Auth::guard('customers')->id(),
                'parent_id' => $request->commentId,
                'content' => $request->comment,
            ];

            $comments->create($dataReply);
            return back();
        }
    }
}
