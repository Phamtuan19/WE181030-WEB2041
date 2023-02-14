<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use App\Models\Categories;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'category_id',
        'path_image',
        'image_publicId',
    ];

    public function scopeSearchBrand($query, $keywords = null, $sortArr = null)
    {

        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'desc';

        if (!empty($sortArr) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }

        $query = $query->orderBy($orderBy, $orderType);

        if (!empty($keywords)) {

            $query = $query->where(function ($query) use ($keywords) {
                $query = $query->where('name', 'like', '%' . $keywords . '%');
            });
        }

        return $query;
    }

    public function cartegory()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
