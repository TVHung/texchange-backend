<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productMobiles()
    {
        return $this->hasMany(ProductMobile::class);
    }

    public function productlaptops()
    {
        return $this->hasMany(ProductLaptop::class);
    }
}
