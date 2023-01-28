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

    public function address ()
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id');
    }
}
