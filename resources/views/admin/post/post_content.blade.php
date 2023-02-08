@extends('admin.layout.index')

@section('page_heading', 'Thêm sản phẩm')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {!! $post->content !!}
        </div>
    </div>
@endsection
