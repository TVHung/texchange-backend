<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'category_id',
        'title',
        'name',
        'description',
        'guarantee',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
