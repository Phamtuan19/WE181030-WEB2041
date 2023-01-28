<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignees extends Model
{
    use HasFactory;

    protected $table = 'consignees';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'name',
        'phone',
        'province',
        'district',
        'ward',
        'specific_address',
    ];
}
