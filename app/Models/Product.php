<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable =[
        'name',
        'images',
        'price',
        'baohanh',
        'phukien',
        'khuyenmai',
        'tinhtrang',
        'desc',
        'brand_id',
    ];
    function brand(){
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
}
