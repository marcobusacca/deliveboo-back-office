<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Type;

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
}
