<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Models\Customers;

use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'product_id',
        'customer_id',
        'parent_id',
        'content',
        'deleted_at',
    ];

    public function comment ()
    {
        return $this->belongsTo(self::class);
    }

    public function user () {
        return $this->belongsToMany(User::class);
    }

    public function customer () {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function post () {
        return $this->belongsToMany(Post::class);
    }
}
