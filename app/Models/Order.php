<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderDetail;

use App\Models\Customers;

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

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function orderStatus ()
    {
        return $this->belongsTo(OrderStatus::class, 'order_statusID', 'id');
    }

    public function consignees ()
    {
        return $this->hasMany(Consignees::class);
    }
}
