<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;
    protected $table="item_orders";
    protected $fillable=[
        'user_id',
        'order_id',
        'prod_id',
        'price',
        'qty'
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'id','prod_id');
    }
}
