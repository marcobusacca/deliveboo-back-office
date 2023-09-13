<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Type;
use App\Models\Product;
use App\Models\Order;

class Restaurant extends Model
{
    use HasFactory;

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
