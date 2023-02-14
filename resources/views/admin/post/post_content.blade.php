@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@section('link')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/posts/css/post_content.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="content">
                {!! $post->content !!}
            </div>
        </div>
    </div>
@endsection
