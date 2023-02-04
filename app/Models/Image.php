<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'product_id',
        'image',
        'is_avatar',
    ];

    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
