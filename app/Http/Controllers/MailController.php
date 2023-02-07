<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\MailNotify;

use App\Models\Order;

use App\Models\OrderDetail;

class MailController extends Controller
{
    function sendMail () {
        // $data = [
        //     'data' => 'nội dung của email',
        // ];

        // // $orders = new Order();
        // // $orderDetail = new OrderDetail();
        // // $order = $orders->find(5);

        // // $order_details = $orderDetail->where('order_id', $order->id)->get();

        // // $data = [
        // //     'order' => $order,
        // //     'order_details' => $order_details
        // // ];

        // // return view('Email.email-order', compact('data'));

        // // $send: người nhận mail
        // $send = 'phamtuan1982000hd@gmail.com';

        // Mail::to($send)->send(new MailNotify($data));
    }
}
