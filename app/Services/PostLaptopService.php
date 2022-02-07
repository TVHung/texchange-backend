<?php
namespace App\Services;

use App\Models\PostLaptop;

class PostLaptopService
{
    public function get($id)
    {
        return PostLaptop::find($id);
    }

    public function getAll()
    {
        return PostLaptop::all();
    }

    public function find($id)
    {
        return PostLaptop::find($id);
    }

    public function update($id, array $post_data){
        $post_laptop = tap(PostLaptop::where('id', $id))->update($post_data);
        return response()->json($post_laptop);
    }

    public function delete($id)
    {
        $post_laptop = PostLaptop::destroy($id);
        return response()->json($id);
    }
}