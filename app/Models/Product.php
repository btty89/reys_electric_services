<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderProduct;

class Product extends Model
{
     use HasFactory;

    protected $guarded = [];

    public function orderProducts()
{
    return $this->hasMany(OrderProduct::class);
}

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {

            $nextId = (Product::max('id') ?? 0) + 1;           // dd($count);

             $product->code = 'PROD-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    } 
}
