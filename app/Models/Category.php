<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Category ke andar mojood products ka relation
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

