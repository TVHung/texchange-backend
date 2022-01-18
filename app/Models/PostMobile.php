<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'color',
        'brand_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
