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
        'post_trade_id',
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
    ];

    public function postMobiles()
    {
        return $this->hasMany(PostMobile::class);
    }

    public function postLaptops()
    {
        return $this->hasMany(PostLaptop::class);
    }

    public function postPcs()
    {
        return $this->hasMany(PostPc::class);
    }
    public function postTrade()
    {
        return $this->hasOne(PostTrade::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishLists()
    {
        return $this->belongsToMany(WishList::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public static function filterPost($request) {
        $posts = Post::query();

        $pipeline = app(Pipeline::class)
            ->send($posts)
            ->through([
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\Name::class,
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Status::class,
                \App\QueryFilters\Video::class,
                \App\QueryFilters\Storage::class,
                \App\QueryFilters\Ram::class,
                \App\QueryFilters\Price::class,
                \App\QueryFilters\Guarantee::class,
                \App\QueryFilters\Display::class
            ])
            ->thenReturn();
        return $pipeline->get();
    }
}
