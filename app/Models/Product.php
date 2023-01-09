<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;

use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'code',
        'name',
        'category_id',
        'brand_id',
        'price',
        'sale',
        'color',
        'quantity',
        'avatar',
        'image',
        'title',
        'detail',
    ];

    public function getAll($keywords = null)
    {
        $products = DB::table($this->table)->orderBy('created_at', 'desc');

        if (!empty($keywords)) {
            $products = $products->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
                // ->orWhere('username', 'like', '%'. $keywords. '%');
            });
        }

        $products = $products->get();

        return $products;
    }

    public function scopeSearch($query)
    {
        if (!empty(request()->brand)) {
            $keyBrand = request()->brand;

            if ($keyBrand == 'all') {
                $query = $query;
            } else {
                $query = $query->whereIn('brand_id',  explode(",", $keyBrand));
            }
        }

        return $query;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
