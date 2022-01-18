<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'is_trade',
        'post_trade_id',
        'title',
        'category_id',
        'name',
        'description',
        'ram',
        'storage_id',
        'status_id',
        'price',
        'address_id',
        'public_status',
        'guarantee'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wish_lists()
    {
        return $this->belongsToMany(WishList::class);
    }

    public function post_images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function post_video()
    {
        return $this->hasOne(PostVideo::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function storage()
    {
        return $this->belongsTo(Address::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
