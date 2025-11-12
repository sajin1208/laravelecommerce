<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $incrementing = true; // Auto-increment ID
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'product_name',
        'product_quantity',
         'product_price',
         'product_category', 
        'product_description',
        'product_image',
    ];
     public function getPaddedProductIdAttribute()
    {   
        return 'P' . str_pad($this->attributes['product_id'], 5, '0', STR_PAD_LEFT);
    }
}
