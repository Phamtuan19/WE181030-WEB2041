<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;

use App\Models\Categories;

use App\Models\Product;

use Illuminate\Http\Request;

use App\Http\Requests\Admin\post\CreateRequest;

use App\Http\Requests\Admin\post\UpdateRequest;

use Illuminate\Support\Facades\Auth;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Post;

        $categories = new Categories();

        $posts = $posts->where('deleted_at', null)->get();

        $categories = $categories->get();

        return view('admin.post.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new Categories();

        $products = new Product();

        $products = $products->select('code', 'name')->get();

        $categories = $categories->get();

        return view('admin.post.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $posts = new Post();

        if ($request->hasFile('post_avatar')) {

            $image = $request->file('post_avatar');

            // dd($request->file('post_avatar'));

            $url = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'duan_laravel/Posts',
            ]);

            if ($url) {

                $posts->user_id = Auth::id();
                $posts->product_code = json_encode($request->product_code);
                $posts->category_id = json_encode($request->category_id);
                $posts->slug = $request->slug;
                $posts->title = $request->title;
                $posts->content = $request->content;
                $posts->avatar_path = $url->getSecurePath();
                $posts->avatar_public_id = $url->getPublicId();
                $posts->timestamps = date('Y-m-d H:i:s');

                $posts->save();

                return back()->with('msg', 'Thêm bài viết thành công');
            }
            return back()->with('msg', 'Đã có lỗi sảy ra vui lòng kiểm tra lại');
        }

        return back()->with('msg', 'Đã có lỗi sảy ra vui lòng kiểm tra lại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = new Categories();

        $products = new Product();

        $products = $products->select('code', 'name')->get();

        $categories = $categories->get();

        return view('admin.post.show', compact('categories', 'products', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {

        $post->user_id = Auth::id();
        $post->product_code = json_encode($request->product_code);
        $post->category_id = json_encode($request->category_id);
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('post_avatar')) {

            if (Cloudinary::destroy($post->avatar_public_id)) {
                $image = $request->file('post_avatar');

                $url = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'duan_laravel/Posts',
                ]);

                if ($url) {
                    $post->avatar_path = $url->getSecurePath();
                    $post->avatar_public_id = $url->getPublicId();
                    $post->timestamps = date('Y-m-d H:i:s');
                }
            }
        }

        $post->save();

        return back()->with('msg', 'Sử bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function postContent(Post $post)
    {

        // dd($post);
        return view('admin.post.post_content', compact('post'));
    }

    public function listSoftErase(Request $request)
    {
        $posts = new Post;

        $categories = new Categories();

        $posts = $posts->where('deleted_at', '!=', null)->get();

        $categories = $categories->get();

        return view('admin.post.list_post_delete', compact('posts', 'categories'));
    }

    public function postSoftErase(Request $request, Post $post)
    {
        // dd($post);
        if ($request->method() == "PATCH") {
            if ($post->deleted_at == null) {

                $post->deleted_at = date('Y-m-d H:i:s');

                $post->save();

                return back()->with('msg', 'Xóa bài viết thành công');
            } else {
                $post->deleted_at = null;

                $post->save();

                return back()->with('msg', 'Khôi phục bài viết thành công');
            }
        }
    }
}
