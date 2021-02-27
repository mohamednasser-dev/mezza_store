<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_color extends Model
{
    protected $fillable = ['product_id', 'color_id'];

    public function Color() {
        return $this->belongsTo('App\Color', 'color_id');
    }
}
