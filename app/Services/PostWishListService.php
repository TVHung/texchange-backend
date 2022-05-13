<?php
namespace App\Services;

use App\Models\PostWishList;
use App\Models\Post;

class PostWishListService extends BaseService
{
    public function get($id)
    {
        return PostWishList::find($id);
    }

    public function getAllWishList($user_id)
    {
        $arrayObjPostId = PostWishList::where('user_id', $user_id)->get(['post_id']);
        $array_postId = array();
        foreach ($arrayObjPostId as $key => $value) {
            array_push($array_postId, $value->post_id);
        }
        return Post::whereIn('id', $array_postId)->get(); //get post favoriate
    }

    public function find($id)
    {
        return PostWishList::find($id);
    }

    public function update($id, array $post_data){
        $post = tap(PostWishList::where('id', $id))->update($post_data);
        return response()->json($post);
    }

    public function delete($post_id, $user_id)
    {
        $post = PostWishList::where(['post_id' => $post_id, 'user_id' => $user_id])->pluck('id')->toArray();
        $post_delete = PostWishList::destroy($post[0]);
        return $post;
    }
}