<?php
namespace App\Services;

use App\Models\PostWishList;
use App\Models\Post;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;

class PostWishListService extends BaseService
{
    public function get($id)
    {
        return PostWishList::find($id);
    }

    //get my post
    public function getAllWishList($user_id)
    {
        $arrayObjPostId = PostWishList::where('user_id', $user_id)->get(['post_id']);
        $array_postId = array();
        foreach ($arrayObjPostId as $key => $value) {
            array_push($array_postId, $value->post_id);
        }
        return Post::join('post_images', 'posts.id', '=', 'post_images.post_id')
                    ->whereIn('posts.id', $array_postId)
                    ->where('post_images.is_banner', '=', 1)
                    ->paginate(config('constants.paginate_wish_list'), array('posts.*', 'post_images.*')); //get post favoriate
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