<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Restaurant;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id', 
        'name', 
        'ingredients',
        'price',
        'description',
        'visible',
        'cover_image',
    ];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
