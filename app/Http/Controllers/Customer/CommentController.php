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

        $comments = new Comment();

        $data = [
            'post_id' => $request->post,
            'customer_id' => Auth::guard('customers')->id(),
            'content' => trim($request->comment),
            'timestamps' => date('Y-m-d H:i:s'),
        ];

        // dd($data);

        if ($comments->create($data)) {
            return back()->with('msg', 'đăng bài viết thành công');
        }
        return back()->with('msg', 'đăng bài viết thất bại');
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


    public function reply(Request $request, $id)
    {

        // dd($request->all());
        $request->validate(
            [
                'comment_parent_id' => 'required',
            ],
            [
                'comment_parent_id.required' => 'Bạn chưa viết bình luận',
            ]
        );

        $comments = new Comment();

        $comment = $comments->find($id);

        $dataReply = [
            'post_id' => $comment->post_id,
            'customer_id' => Auth::guard('customers')->id(),
            'parent_id' => $comment->id,
            'content' => $request->comment_parent_id,
        ];

        $comments->create($dataReply);
        return back();
    }
}
