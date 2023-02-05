<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\ShippingAddress;


class Customers extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'province',
        'district',
        'ward',
        'specific_address',
        'is_active',
    ];

    public function scopeSearchCustomer($query, $is_active = null, $keywords = null, $sortArr)
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
                $query = $query->where('name', 'like', '%' . $keywords . '%')
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

    public function address ()
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id');
    }
}
