<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderDetail;

use App\Models\User;

use App\Models\OrderStatus;

use App\Models\Consignees;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code_order',
        'customer_id',
        'date_order',
        'date_confirmation',
        'date_delivered',
        'user_notes',
        'shop_notes',
        'order_statusID',
        'delivery_form',
        'quantity',
        'total_money',
    ];

    public function scopeSearch($query, $orderStatus = null, $keyword = null, $sortArr = null)
    {
        $order_status_id = '';
        if (!empty($orderStatus)) {
            $order_status_id = OrderStatus::select('id')->where('slug', 'like', '%' . $orderStatus . '%')->get();
        }

        // dd($order_status_id);

        $keyword_ = '';
        if (!empty($keyword)) {
            $keyword_ = Consignees::select('order_id')->where('phone', 'like', '%' . $keyword . '%')->get();
        }

        if (!empty($order_status_id)) {
            $query = $query->where('order_statusID', $order_status_id[0]->id);
        }

        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'desc';

        if (!empty($sortArr) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }

        $query = $query->orderBy($orderBy, $orderType)->get();


        // Xử lý tìm kiếm bằng input
        $arr = [];

        if (!empty($keyword_)) {
            foreach ($query as $item) {
                foreach ($keyword_ as $value) {
                    if ($item->id == $value->order_id) {
                        array_push($arr, $item);
                    }
                }
            }

            return $arr;
        }

        $arr = $query;

        return $arr;
    }

    public function scopeDashboard($query)
    {

        // Sales volume && Order successful
        $order = $query->get();

        $unconfirmedOrder = []; // đơn hàng chưa xác nhận
        $orderConfirmed = []; // đơn hàng đã xác nhận
        $orderShipping = []; // đơn hàng đang giao
        $totalSales = 0; // tổng doanh thu
        $orderSuccess = []; // đơn hàng giao thành công
        $cancelOrder = [];  // đơn hàng hủy
        $productsSold = 0;
        foreach ($order as $value) {
            if ($value->order_statusID == 1) {
                array_push($unconfirmedOrder, $value);
            }

            if ($value->order_statusID == 2) {
                array_push($orderConfirmed, $value);
            }

            if ($value->order_statusID == 3) {
                array_push($orderShipping, $value);
            }

            if ($value->order_statusID == 4) {
                $totalSales += $value->total_money;
                $productsSold += $value->quantity;
                array_push($orderSuccess, $value);
            }

            if ($value->order_statusID == 5) {
                array_push($cancelOrder, $value);
            }
        }

        $products = Product::all();
        $totalProduct = 0;
        foreach ($products as $product) {
            $totalProduct += $product->input_quantity;
        }

        $totalProduct = $totalProduct - $productsSold;

        // Total New Order

        $totalOrders = $query->orderBy('created_at', 'DESC')->take(10)->get();
        // dd($totalOrders);
        $queryArr = [
            'totalSales' => $totalSales,
            'orderSuccess' => $orderSuccess,
            'unconfirmedOrder' => $unconfirmedOrder,
            'orderConfirmed' => $orderConfirmed,
            'orderShipping' => $orderShipping,
            'cancelOrder' => $cancelOrder,
            'productsSold' => $productsSold,
            'totalProduct' => $totalProduct,
            'totalOrders' => $totalOrders,
        ];

        return $queryArr;
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_statusID', 'id');
    }

    public function consignees()
    {
        return $this->hasMany(Consignees::class);
    }
}
