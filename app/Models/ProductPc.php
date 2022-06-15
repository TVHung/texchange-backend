<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPc extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'cpu',
        'gpu',
        'storage_type',
        'display_size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
