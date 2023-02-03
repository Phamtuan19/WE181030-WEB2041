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

    public function getAll ($keywords = null)
    {
        $users = DB::table($this->table)
        ->orderBy('created_at', 'DESC');

        if(!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%'. $keywords. '%')
                    ->orWhere('username', 'like', '%'. $keywords. '%');
            });
        }

        $users = $users->paginate(3)->withQueryString();
        // $users->get();
        return $users;
    }

    public function position ()
    {
        return $this->belongsTo(Position::class);
    }
}
