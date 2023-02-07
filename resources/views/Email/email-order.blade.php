<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="./index.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Document</title>

    <style>
        tr,
        th,
        td {
            vertical-align: middle !important;
            text-align: center !important;
        }

        p {
            margin-bottom: 6px;
            color: #333;
            font-size: 16px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4" style="text-align: center">
                <img src="http://rubee.com.vn/admin/webroot/upload/image/images/louis-vuitton-logo.jpg" width=""
                    height="70px" alt="" />
            </div>
        </div>

        <div class="col-lg-12 mt-3 p-3"
            style="
               background-color: #36bea6;
               color: #fff;
               text-align: center;
               font-size: 18px;
               font-weight: 600;
            ">
            <span>Cảm ơn quý khách đã quan tâm & sử dụng dịch vụ của chúng
                tôi</span>
        </div>

        <div class="" style="margin: 12px auto; background-color: ;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 py-3 px-4" style="">
                        <h2 style="color: #0000ff">Thông tin đơn hàng</h2>
                        <p style="padding-left: 10px"> Người nhận: {{ $data['order']->consignees[0]->name }}</p>
                        <p style="padding-left: 10px"> Số điện thoại: {{ $data['order']->consignees[0]->phone }}</p>
                        <p style="padding-left: 10px"> Email: {{ $data['order']->consignees[0]->email }}</p>
                        <p style="padding-left: 10px"> Mã đơn hàng: #524512</p>
                        <p style="padding-left: 10px"> Thời gian đặt hàng: 2023-02-06 17:15:00</p>
                        <p style="padding-left: 10px"> Tổng tiền: 51.900.000 đ</p>
                        <p style="padding-left: 10px"> Địa chỉ: {{ $data['order']->consignees[0]->specific_address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover mt-4" style="width: 100%;">
            <thead style="border-top: 1px solid #ccc">
                <tr>
                    <th scope="col" width="150px">Mã SP</th>
                    <th scope="col" width="100px">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($data['order_details'] as $item)
                    <tr>
                        {{-- @dd($item->product->name) --}}
                        <th># {{ $item->product_code }}</th>
                        <td>
                            <img src="{{ $item->product->image[0]->path }}"
                                width="100%" alt="" />
                        </td>
                        <td style="font-weight: 600; font-size: 18px">
                            {{ $item->product->name }}
                        </td>
                        <td>
                            <span></span>
                            <span style="color: red; font-weight: 600; font-size: 18px">{{ $item->product->price }} đ</span>
                        </td>
                        <td style="font-weight: 600; font-size: 18px">{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-lg-3 mt-3" style="float: right">
            <span style="font-weight: 600; font-size: 18px">Tổng tiền:
                <small style="color: red; font-size: 18px">{{ $data['order']->total_money }}</small></span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
