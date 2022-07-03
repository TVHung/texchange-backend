<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Comment;

/**
 * Class CommentRepository.
 */
class CommentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Comment::class);  //đinh nghĩa model Product
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = Comment::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return Comment::where('id', $id)->exists();
    }
}
