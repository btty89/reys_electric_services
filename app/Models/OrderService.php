<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $guarded = [];
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
