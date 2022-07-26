<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'brand_id',
        'color',
        'pin',
        'resolution'
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
