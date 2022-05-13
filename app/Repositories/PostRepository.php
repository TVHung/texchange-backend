<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Post::class);  //đinh nghĩa model post
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = Post::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return Post::where('id', $id)->exists();
    }
}
