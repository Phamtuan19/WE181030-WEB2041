<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'product_id',
        'category_id',
        'slug',
        'title',
        'content',
        'avatar_path',
        'avatar_public_id',
        'deleted_at',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function category () {
        return $this->belongsToMany(Categories::class, 'category_id', 'id');
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }
}
