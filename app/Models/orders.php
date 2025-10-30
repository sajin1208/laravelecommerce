<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $incrementing = true; // Auto-increment ID
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'order_status',

    ];
}
