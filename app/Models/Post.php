<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'storage_id',
        'status_id',
        'price',
        'address_id',
        'public_status',
        'guarantee'
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

    public function postVideo()
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
