<?php
namespace App\Services;

use App\Models\Post;

class PostService
{
    public function get($id)
    {
        return Post::find($id);
    }

    public function getAll()
    {
        return Post::all();
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function update($id, array $post_data){
        $post = tap(Post::where('id', $id))->update($post_data);
        return response()->json($post);
    }

    public function delete($id)
    {
        $post = Post::destroy($id);
        return response()->json($id);
    }
}