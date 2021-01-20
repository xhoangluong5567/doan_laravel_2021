<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    function orderdetails(){
        return $this->hasMany('App\Models\Order');
    }
}
