<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'district',
        'ward',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
