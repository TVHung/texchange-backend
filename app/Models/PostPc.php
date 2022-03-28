<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPc extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'cpu',
        'gpu',
        'storage_type',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
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
