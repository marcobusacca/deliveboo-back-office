<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Restaurant;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
