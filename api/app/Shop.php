<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_name', 'shop_url', 'currency'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'shop_id', 'id');
    }
}
