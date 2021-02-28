<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'address','notes','status'];

    
    public function OrderDetails() {
        return $this->hasMany('App\OrderDetail', 'order_id','id');
    }
}
