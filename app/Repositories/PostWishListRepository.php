<?php

namespace App\Repositories;
use App\Models\PostWishList;
/**
 * Class PostWishListRepository.
 */
class PostWishListRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(PostWishList::class);  //đinh nghĩa model post
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = PostWishList::where('id', $id)->update($data);
        return $data;
    }

    public function create($userInfo)
    {
        try {
            
        } catch (\Exception $e) {
           
        }
    }

    public function isExists($id)
    {
        return $this->getInstance()::where('user_id', $id)->exists();
    }

    //check ton tai cua san pham yeu thich
    public function isExistPost($user_id, $post_id)
    {
        return $this->getInstance()::where(['user_id'=> $user_id, 'post_id' => $post_id])->exists();
    }
}
