<?php
namespace App\Services;

use App\Models\PostMobile;

class PostMobileService
{
    public function get($id)
    {
        return PostMobile::find($id);
    }

    public function getAll()
    {
        return PostMobile::all();
    }

    public function find($id)
    {
        return PostMobile::find($id);
    }

    public function update($id, array $post_data){
        $post_mobile = tap(PostMobile::where('id', $id))->update($post_data);
        return response()->json($post_mobile);
    }

    public function delete($id)
    {
        $post_mobile = PostMobile::destroy($id);
        return response()->json($id);
    }
}