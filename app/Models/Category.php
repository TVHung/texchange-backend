<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function storages()
    {
        return $this->hasMany(Storage::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

}
