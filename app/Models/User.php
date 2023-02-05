<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\DB;

use App\Models\Position;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'phone',
        'position_id',
        'is_active',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearchUser($query, $is_active = null, $keywords = null, $sortArr)
    {
        if (!empty($is_active)) {
            if ($is_active == "active") {
                $active = 1;
            } else {
                $active = 0;
            }
            $query = $query->where('is_active', $active);
        }
        // dd($keywords);

        if (!empty($keywords)) {

            $query = $query->where(function ($query) use ($keywords) {
                $query = $query->where('username', 'like', '%' . $keywords . '%')
                    ->orwhere('phone', 'like', '%' . $keywords . '%');
            });
        }

        // logic xắp xếp
        $orderBy = 'created_at';
        $orderType = 'desc';

        if (!empty($sortArr) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
                $orderType = trim($sortArr['sortType']);
            }
        }

        $query = $query->orderBy($orderBy, $orderType)->get();
        // $users->get();
        return $query;
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
