<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=[
        'id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'total',
        'pincode',
        'track_no'
    ];

    public function items()
    {
        return $this->hasMany(ItemOrder::class);
    }
}
