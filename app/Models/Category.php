<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $incrementing = true; // Auto-increment ID
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    public function products()
{
    return $this->belongsTo(Product::class, 'product_id', 'product_id');
}}
