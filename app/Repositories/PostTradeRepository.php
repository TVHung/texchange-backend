<?php

namespace App\Repositories;
use App\Models\PostTrade;

class PostTradeRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(PostTrade::class);  //đinh nghĩa model post
        $this->fields = $this->getInstance()->getFillable();
    }

    public function isExists($id)
    {
        return PostTrade::where('id', $id)->exists();
    }
}
