@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/view_post.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/comment.css') }}">
@endsection


@section('content-product')
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mt-4">
                <div class="view_post">
                    {!! $post->content !!}
                </div>
            </div>


        </div>
    </div>

    @include('customer.layout.comment')
@endsection

@section('js')
    <script src="{{ asset('customer/js/comment.js') }}"></script>
@endsection
