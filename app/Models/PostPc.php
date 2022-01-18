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

}
