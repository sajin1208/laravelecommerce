<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'total_price',
    ];

    public function product()
{
    return $this->belongsTo(Product::class, 'product_id', 'product_id');
}
}
