@extends('customer.layout.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('customer/css/cart.css') }}">
@endsection

@section('title', 'Trang sản phẩm')

@section('content-product')
    <div class="div-fake" style="height: 62px"></div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-9">
                <div class="carts-detail">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col" width="150px">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá Tiền</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col" width="70px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <div class="detail-image">
                                            <a href="#" class="detail-image_link">
                                                <img src="	https://shopdunk.com/images/thumbs/0009495_iphone-14-plus-128gb_80.png"
                                                    alt="" class="detail_img">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">iPhone 14 Plus 128GB</a>
                                    </td>
                                    <td>23.750.000₫</td>
                                    <td>
                                        <div class="input-group justify-content-center">
                                            <input type="text" class="form-control" value="1" aria-label="quatity"
                                                aria-describedby="basic-addon1" style="width: 60px">
                                        </div>
                                    </td>
                                    <td>
                                        <p><i class="fa-solid fa-trash"></i></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
