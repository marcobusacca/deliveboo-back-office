<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Restaurant;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name', 
        'surname', 
        'phone_number',
        'email',
        'address',
        'notes',
        'order_status',
        'total',
    ];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'sub_total');
    }
}
