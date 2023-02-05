@extends('admin.layout.index')

{{-- @section('page_heading', 'Danh sách đơn hàng') --}}
{{--
@section('redirect')
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa-solid fa-left-long text-white-50 pr-3"></i>
        Tạo đơn hàng
    </a>
@endsection --}}

@section('content')
    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row" style="margin: 0 -1.5rem">
            @foreach ($images as $image)
                <div class="col-lg-2 m-1" style="border: 1px solid #ccc; border-radius: 5px; padding: 12px">
                    <div class="">
                        <img src="http://127.0.0.1:8000/{{ $image->image }}" alt="" style="width: 100%;">
                    </div>
                    <div class="" style="text-align: center">
                        <div class="form-group" style="margin-bottom: 0 !important ; padding: 12px 0 0 0">
                            {{-- <label for="">{{ $image->product->name }}</label>
                            <label for="">{{ date_format($image->created_at, "H:i:s / d-m-Y ") }}</label> --}}
                            <br>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
