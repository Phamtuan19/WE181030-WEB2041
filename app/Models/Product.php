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
        'promotion_price',
        'input_quantity',
        'quantity_stock',
        'quantity_sold',
        'avatar',
        'image',
        'information',
        'detail',
    ];

    public function getAll($query)
    {
        $query = $query->paginate(5);

        return $query;
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

    public function scopeCarts($query)
    {
        if (!empty(request()->product_code)) {
            $product_code = request()->product_code;

            $query = $query->whereIn('code', explode(",", $product_code));
        }

        return $query;
    }

    public function scopeSearchAdmin($query, $categoryKey = null, $brandKey = null, $keyword = null, $sortArr = null)
    {
        // logic tìm kiếm
        if (!empty($categoryKey)) {
            $category = Categories::where('slug', $categoryKey)->get();
            $query = $query->where('category_id', $category[0]->id);
        }
        if (!empty($brandKey)) {
            $brand = Brand::where('name', $brandKey)->get();

            $query = $query->where('brand_id', $brand[0]->id);
        }

        if (!empty($keyword)) {
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }
        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'DESC';

        if (!empty($sortArr) && is_array($sortArr)) {

            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }

        $query = $query->orderBy($orderBy, $orderType)->where('deleted_at', null)->paginate(10);

        return $query;
    }

    public function scopeSearchProductDelete($query, $categoryKey = null, $brandKey = null, $keyword = null, $sortArr = null)
    {
        // logic tìm kiếm
        if (!empty($categoryKey)) {
            $category = Categories::where('slug', $categoryKey)->get();
            $query = $query->where('category_id', $category[0]->id);
        }
        if (!empty($brandKey)) {
            $brand = Brand::where('name', $brandKey)->get();

            $query = $query->where('brand_id', $brand[0]->id);
        }

        if (!empty($keyword)) {
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }
        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'ASC';

        if (!empty($sortArr) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }

        $query = $query->orderBy($orderBy, $orderType)->where('deleted_at', '!=', null)->get();
        // dd($query);
        return $query;
    }


    public function scopeFilterPrice($query, $category, $brand = null, $priceArr = null, $sortArr = null)
    {
        // filter price
        $min_price = 0;

        $max_price = Product::select('price')->orderBy('price', 'DESC')->first()->price;

        if (!empty($priceArr) && is_array($priceArr)) {

            if (!empty($priceArr['min'])) {
                $min_price = $priceArr['min'];
            }

            if (!empty($priceArr['max'])) {
                $max_price = $priceArr['max'];

            }
            $query = $query->where('price', '>=', $min_price)
                ->where('price', '<=', $max_price);
        }


        // filter brand

        if (!empty($brand)) {
            $brand = Brand::select('id')->where('name', $brand)->get();

            $query = $query->where('brand_id', $brand[0]->id);
        }


        if (!empty($category)) {
            $category = Categories::select('id')->where('slug', $category)->get();

            $query = $query->where('category_id', $category[0]->id);
        }

        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'ASC';

        if (!empty($sortArr) && is_array($sortArr)) {

            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }
        $query = $query->orderBy($orderBy, $orderType);

        return $query;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
