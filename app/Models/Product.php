<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'price',
        'describe',
        'image',
        'category_id',
        'size_id',
        'color_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class, 'products_size', 'product_id', 'size_id');
    }
    public function colors(){
        return $this->belongsToMany(Color::class, 'products_color', 'product_id', 'color_id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

}
