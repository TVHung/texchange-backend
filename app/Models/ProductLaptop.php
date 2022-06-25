<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'brand_id',
        'color',
        'cpu',
        'gpu',
        'storage_type',
        'display_size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
