<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'type',
    ];

    // public function getAll($keywords = null) {
    //     $products = DB::table($this->table)->orderBy('created_at', 'desc');

    //     if(!empty($keywords)){
    //         $products = $products->where(function ($query) use ($keywords) {
    //             $query->where('name', 'like', '%'. $keywords. '%');
    //                 // ->orWhere('username', 'like', '%'. $keywords. '%');
    //         });
    //     }

    //     $products = $products->get();

    //     return $products;

    // }
}
