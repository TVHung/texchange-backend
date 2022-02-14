<?php
namespace App\Services;

use App\Models\PostImage;

class PostImageService
{
    public function get($id)
    {
        return PostImage::find($id);
    }

    public function getAll()
    {
        return PostImage::all();
    }

    public function find($id)
    {
        return PostImage::find($id);
    }

    public function update($id, array $post_data){
        $post_image = tap(PostImage::where('id', $id))->update($post_data);
        return response()->json($post_image);
    }

    public function delete($id)
    {
        dd($id);
        $post_image = PostImage::destroy($id);
        return response()->json($id);
    }
}