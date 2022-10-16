<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table="wishlists";
    protected $fillable=[
        'prod_id',
        'user_id',
        'qty',
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','prod_id');
    }
}
