<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_trade',
        'title',
        'category_id',
        'name',
        'description',
        'ram',
        'storage',
        'video_url',
        'status',
        'price',
        'address',
        'public_status',
        'guarantee',
        'sold',
        'color',
        'cpu',
        'gpu',
        'storage_type',
        'brand_id',
        'display_size',
        'is_block',
    ];

    public function postTrade()
    {
        return $this->hasOne(PostTrade::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postWishLists()
    {
        return $this->hasMany(PostWishList::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
                \App\QueryFilters\Search::class,
                \App\QueryFilters\Address::class,
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Card::class,
                \App\QueryFilters\Status::class,
                \App\QueryFilters\Video::class,
                \App\QueryFilters\Storage::class,
                \App\QueryFilters\StorageType::class,
                \App\QueryFilters\Ram::class,
                \App\QueryFilters\Price::class,
                \App\QueryFilters\Guarantee::class,
                \App\QueryFilters\Display::class,
                \App\QueryFilters\Brand::class,
                \App\QueryFilters\CreatedAt::class
            ])
            ->thenReturn();
        return $pipeline->get();
    }
}
