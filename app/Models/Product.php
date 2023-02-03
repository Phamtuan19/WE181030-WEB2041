<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;

use Illuminate\Support\Facades\DB;

use App\Models\Attribute;

use App\Models\Categories;

use App\Models\Image;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'code',
        'name',
        'category_id',
        'brand_id',
        'import_price',
        'price',
        'input_quantity',
        'quantity_stock',
        'quantity_sold',
        'avatar',
        'image',
        'information',
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

    public function scopeSearch ($query)
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

    public function scopeCarts ($query)
    {
        if(!empty(request()->product_code)){
            $product_code = request()->product_code;

            $query = $query->whereIn('code', explode(",", $product_code));
        }

        return $query;
    }

    public function scopeSearchAdmin ($query) {
        if(!empty(request()->category)){
            $category = Categories::where('slug', request()->category)->get();

            $query = $query->where('category_id', $category[0]->id);
        }
        if(!empty(request()->brand)){
            $brand = Brand::where('slug', request()->brand)->get();

            $query = $query->where('brand_id', $brand[0]->id);
        }

        if(!empty(request()->keyword)){
            $query = $query->where('name', 'like', '%'.request()->keyword.'%');
        }

        $query = $query->get();

        return $query;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function cartegory ()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function attribute ()
    {
        return $this->hasOne(Attribute::class);
    }

    public function image ()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
