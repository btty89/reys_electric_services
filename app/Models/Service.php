<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
       protected $guarded = [];
       
       public function orderServices()
       {
              return $this->hasMany(OrderService::class);
       }
}
