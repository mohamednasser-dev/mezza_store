<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['product_id', 'order_id', 'quantity','price','total'];

    public function Product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function Order() {
        return $this->belongsTo('App\Order', 'order_id');
    }
}
