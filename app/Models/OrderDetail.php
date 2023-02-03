<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_code',
        'price',
        'quantity',
    ];

    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_code', 'code');
    }
}
