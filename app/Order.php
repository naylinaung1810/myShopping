<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItem()
    {
        return $this->hasMany("App\Orderitem");
    }
    public function city()
    {
        return $this->belongsTo("App\City");
    }
}
