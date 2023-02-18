<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function subCategory($query)
    {
        $query = $query->get();

        $rootQuery = $query->where('parent_id', null)->toArray();
        // dd($rootQuery);
        foreach ($rootQuery as $key => $item) {
            // dd($item);
            $rootQuery[$key]['children'] = $query->where('parent_id', $item['id'])->toArray();
        }

        return $rootQuery;
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public function product () {
        return $this->hasMany(Product::class, 'category_id');
    }
}
