<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    public $timestamps = false;

    public function checkout()
    {
        return $this->belongsTo('App\Checkout');
    }
}
