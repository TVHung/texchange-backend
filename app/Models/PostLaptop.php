<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'color',
        'cpu',
        'gpu',
        'storage_type',
        'brand_id',
        'display_size',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public static function filterPost($request) {
        $posts = Post::query();

        $pipeline = app(Pipeline::class)
            ->send($posts)
            ->through([
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn();
        return $pipeline->get();
    }
}
