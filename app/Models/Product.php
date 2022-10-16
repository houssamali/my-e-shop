<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'name',
        'small_description',
        'long_description',
        'price',
        'over_price',
        'tax',
        'qty',
        'trending',
        'public',
        'status',
        'image'
    ];

    public function category()
    {
        return $this->hasOne(Category,'cate_id','id');
    }
}
