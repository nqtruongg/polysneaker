<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'status',
        'total'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'order_details')->withPivot('quantity', 'price')->withTimestamps();
    }

}
