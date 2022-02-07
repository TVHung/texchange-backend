<?php
namespace App\Services;

use App\Models\PostPc;

class PostPcService
{
    public function get($id)
    {
        return PostPc::find($id);
    }

    public function getAll()
    {
        return PostPc::all();
    }

    public function find($id)
    {
        return PostPc::find($id);
    }

    public function update($id, array $post_data){
        $post_pc = tap(PostPc::where('id', $id))->update($post_data);
        return response()->json($post_pc);
    }

    public function delete($id)
    {
        $post_pc = PostPc::destroy($id);
        return response()->json($id);
    }
}