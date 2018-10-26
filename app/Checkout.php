<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function checkoutdetail()
    {
        return $this->hasOne('App\CheckoutDetail', 'checkout_id', 'id');
    }

    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    


}
