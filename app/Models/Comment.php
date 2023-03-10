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
        'user_id',
        'parent_id',
        'content',
        'deleted_at',
    ];

    public function children ()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function users () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post () {
        return $this->belongsToMany(Post::class);
    }
}
