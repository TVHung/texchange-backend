<?php
namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PostTradeRepository;
use App\Repositories\PostImageRepository;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostService extends BaseService
{
    private $postRepo;
    private $postTradeRepo;
    private $postImageRepo;
    public function __construct(PostRepository $postRepo, PostTradeRepository $postTradeRepo, PostImageRepository $postImageRepo)
    {
        $this->postRepo = $postRepo;
        $this->postTradeRepo = $postTradeRepo;
        $this->postImageRepo = $postImageRepo;
    }

    public function getAllAdmin () {
        return Post::all();
    }

    public function getAllBase () {
        return Post::all()
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0);
    }

    public function get($post_id)
    {
        try {
            if (!$this->postRepo->isExists($post_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->postRepo->getById($post_id);
            return $this->sendResponse(config('apps.message.get_post_success'), new PostResource($data));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getWithEdit($post_id, $user_id)
    {
        try {
            if (!$this->postRepo->isExists($post_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->postRepo->getById($post_id);
            if($data->user_id == $user_id)
                return $this->sendResponse(config('apps.message.get_post_success'), new PostResource($data));
            else
                return $this->sendError(config('apps.message.not_complete'));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    //get all without login
    public function getAllWithoutLogin()
    {
        return $this->getAllBase();
    }
    //get all when logined
    public function getAll($user_id)
    {
        //get all post id of wish list have user_id is current user id
        $postIds = DB::table('post_wish_lists')->select('post_id')->where('user_id', '=', $user_id)->get()->toArray();
        $arr_postId = [];
        foreach ($postIds as $postId) {
            array_push($arr_postId,  $postId->post_id);
        }
        return Post::all()
            ->where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->whereNotIn('id', $arr_postId);
    }

    public function getUserPosts($user_id)
    {
        return Post::all()->where('user_id', '=', $user_id);
    }

    //get post recently
    public function getRecentlyPosts($user_id = null)
    {
        if($user_id){
            //get all post id of wish list have user_id is current user id
            $postIds = DB::table('post_wish_lists')->select('post_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_postId = [];
            foreach ($postIds as $postId) {
                array_push($arr_postId,  $postId->post_id);
            }
            return Post::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->whereNotIn('id', $arr_postId)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }else{
            return Post::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }
    }

    //get post recently
    public function getPostHasTrade($user_id = null)
    {
        if($user_id){
            $postIds = DB::table('post_wish_lists')->select('post_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_postId = [];
            foreach ($postIds as $postId) {
                array_push($arr_postId,  $postId->post_id);
            }
            return Post::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_trade', 1)
            ->whereNotIn('id', $arr_postId)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }else{
            return Post::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_trade', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        }
    }

    //get post category
    public function getPostCategory($user_id = null, $category_id)
    {
        if(!in_array($category_id, config('constants.category'))){
            return [];
        }
        $posts = $this->getAllWithCondition($user_id, null);
        return $posts->where('category_id', '=', $category_id);
    }

    //lay danh sach voi truong hop da login va chua login
    public function getAllWithCondition($user_id)
    {
        if($user_id){
            //get all post id of wish list have user_id is current user id
            $postIds = DB::table('post_wish_lists')->select('post_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_postId = [];
            foreach ($postIds as $postId) {
                array_push($arr_postId,  $postId->post_id);
            }
            return Post::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->whereNotIn('id', $arr_postId)
            ->take(6)
            ->get();
        }else{
            return Post::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->take(6)
            ->get();
        }
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function setBlock($request)
    {
        if(Auth::user()->is_admin !== config('constants.is_admin')){
            $post_id = $request->input('post_id');
            $is_block = $request->input('is_block');
            $post = $this->find($post_id);
            if($post){
                $post->is_block = $is_block;
                $post->save();
                return $this->sendResponse(config('apps.message.block_success'), []);
            }else{
                return $this->sendError(config('apps.message.block_error'), [], config('apps.general.error_code'));
            }
        }else{
            return $this->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }
    }

    public function create($request, $user_id)
    {
        // dd($request->input('video_url'));
        try {
            DB::beginTransaction();
            $postData = [
                'user_id' => $user_id,
                'is_trade' => $request->input('is_trade'),
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'ram' => $request->input('ram'),
                'storage' => $request->input('storage'),
                'video_url' => null,
                'status' => $request->input('status'),
                'price' => $request->input('price'),
                'address' => $request->input('address'),
                'public_status' => $request->input('public_status'),
                'guarantee' => $request->input('guarantee'),
                'sold' => $request->input('sold'),
                'color' => $request->input('color'),
                'cpu' => $request->input('cpu'),
                'gpu' => $request->input('gpu'),
                'storage_type' => $request->input('storage_type'),
                'brand_id' => $request->input('brand_id'),
                'display_size' => $request->input('display_size'),
                'is_block' => config('constants.is_not_block'),
            ];
            switch ($request->input('category_id')) {
                case 1:
                    $postData['cpu'] = null;
                    $postData['gpu'] = null;
                    $postData['storage_type'] = null;
                    $postData['display_size'] = null;
                    break;
                case 3:
                    $postData['brand_id'] = null;
                    $postData['display_size'] = null;
                    $postData['color'] = null;
                    break;
                default:
                    break;
            }
            // dd("a");
            if($request->file('fileVideo') != null || $request->file('fileVideo') != ""){
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('fileVideo')->getRealPath(), ['folder' => 'post_videos'])->getSecurePath();
                $postData['video_url'] = $uploadedFileUrl;
            }
            $newPost = $this->postRepo->store($postData);
            
            if($request->file('fileImage') != null || $request->file('fileImage') != ""){
                $uploadedFileImageUrl = Cloudinary::upload($request->file('fileImage')->getRealPath(), ['folder' => 'post_images'])->getSecurePath();
                $imageData = [
                    'post_id' => $newPost->id,
                    'is_banner' => 1,
                    'image_url' => $uploadedFileImageUrl,
                ];
                $newPostImage = $this->postImageRepo->store($imageData);
            }
            if($request->input('is_trade') == 1){
                $validator = Validator::make($request->all(), [
                    'category_idTrade' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
                    'nameTrade' => 'bail|required|string',
                    'descriptionTrade' => 'bail|required|string',
                    'titleTrade' => 'bail|required|string',
                    'guaranteeTrade' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
                ],
                [
                    //require
                    'category_idTrade.required'=> config('apps.validation.feild_require'), 
                    'nameTrade.required'=> config('apps.validation.feild_require'), 
                    'titleTrade.required'=> config('apps.validation.feild_require'), 
                    'descriptionTrade.required'=> config('apps.validation.feild_require'), 
                    //string
                    'nameTrade.string'=> config('apps.validation.feild_is_string'), 
                    'titleTrade.string'=> config('apps.validation.feild_is_string'), 
                    'descriptionTrade.string'=> config('apps.validation.feild_is_string'), 
                    //number
                    'category_idTrade.regex'=> config('apps.validation.feild_is_number'),
                    'guaranteeTrade.regex'=> config('apps.validation.feild_is_number'),
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors());
                }
                $postTradeData = [
                    'post_id' => $newPost->id,
                    'category_id' => $request->input('category_idTrade'),
                    'name' => $request->input('nameTrade'),
                    'title' => $request->input('titleTrade'),
                    'description' => $request->input('descriptionTrade'),
                    "guarantee" => $request->input('guaranteeTrade')
                ];
                $newPostTrade = $this->postTradeRepo->store($postTradeData);
            }
            DB::commit();
            return $this->sendResponse(config('apps.message.create_post_success'), new PostResource($newPost));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.create_post_error'), [], config('apps.general.error_code'));
        }
    }

    public function update($user_id, $post_id, $request){
        try {
            DB::beginTransaction();
            $postData = $request->only(['is_trade', 'title', 'name',
                'description', 'ram', 'storage', 'video_url', 'status', 'price', 'address',
                'public_status', 'guarantee', 'sold', 'color', 'cpu', 'gpu', 'storage_type', 
                'brand_id', 'display_size'
            ]);
            $postData['user_id'] = $user_id;

            $category_id_post = $this->postRepo->getById($post_id)->category_id;
            switch ($category_id_post) {
                case 1:
                    $postData['cpu'] = null;
                    $postData['gpu'] = null;
                    $postData['storage_type'] = null;
                    $postData['display_size'] = null;
                    break;
                case 3:
                    $postData['brand_id'] = null;
                    $postData['display_size'] = null;
                    $postData['color'] = null;
                    break;
                default:
                    break;
            }
            //kiem tra khi edit co xoa anh hay khong
            if($request->input('is_delete_image') != null || $request->input('is_delete_image') != ""){
                $imageIds = explode(",", $request->input('is_delete_image'));
                $deleteImages = $this->postImageRepo->deleteWithListId($imageIds, $post_id);
            }
            //kiem tra khi edit có xoa video hay khong
            if($request->input('is_delete_video') == config('apps.general.is_delete_video'))
                $postData['video_url'] = null;
            
            // kiem tra neu co video thi tao moi
            if($request->input('fileVideo') != null || $request->input('fileVideo') != ""){
                $uploadedFileUrl = Cloudinary::uploadVideo($request->input('fileVideo')->getRealPath(), ['folder' => 'post_videos'])->getSecurePath();
                $postData['video_url'] = $uploadedFileUrl;
            }
            //kiem tra neu có image
            // if($request->file('fileImage') != null || $request->file('fileImage') != ""){
            //     $uploadedFileImageUrl = Cloudinary::upload($request->file('fileImage')->getRealPath(), ['folder' => 'post_images'])->getSecurePath();
            //     $imageData = [
            //         'post_id' => $post_id,
            //         'is_banner' => 1,
            //         'image_url' => $uploadedFileImageUrl,
            //     ];
            //     $newPostImage = $this->postImageRepo->store($imageData);
            // }
            $updatePost = $this->postRepo->updateByField('id', $post_id, $postData);

            $post_trade_id = DB::table('post_trades')->where('post_id', $post_id)->pluck('id')->first();
            if($request->input('is_trade') == 1){ //if have post trade and update
                $validator = Validator::make($request->all(), [
                    'category_idTrade' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
                    'nameTrade' => 'bail|required|string',
                    'descriptionTrade' => 'bail|required|string',
                    'titleTrade' => 'bail|required|string',
                ],
                [
                    //require
                    'category_idTrade.required'=> config('apps.validation.feild_require'), 
                    'nameTrade.required'=> config('apps.validation.feild_require'), 
                    'titleTrade.required'=> config('apps.validation.feild_require'), 
                    'descriptionTrade.required'=> config('apps.validation.feild_require'), 
                    //string
                    'nameTrade.string'=> config('apps.validation.feild_is_string'), 
                    'titleTrade.string'=> config('apps.validation.feild_is_string'), 
                    'descriptionTrade.string'=> config('apps.validation.feild_is_string'), 
                    //number
                    'category_idTrade.regex'=> config('apps.validation.feild_is_number'),
                    'guaranteeTrade.regex'=> config('apps.validation.feild_is_number'),
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors());
                }
                $postTradeData = [
                    'category_id' => $request->input('category_idTrade'),
                    'name' => $request->input('nameTrade'),
                    'title' => $request->input('titleTrade'),
                    'description' => $request->input('descriptionTrade'),
                    "guarantee" => $request->input('guaranteeTrade')
                ];
                if($post_trade_id)
                    $updatePostTrade = $this->postTradeRepo->updateByField('id', $post_trade_id, $postData);  //update
                else {
                    $postTradeData['post_id'] = (int) $post_id;
                    $newPostTrade = $this->postTradeRepo->store($postTradeData);
                }
                // dd($postTradeData);
            }else{ //have post trade and delete
                $deletePostTrade = $this->postTradeRepo->deleteByField('id', $post_trade_id);
            }
            DB::commit();
            return $this->sendResponse(config('apps.message.update_post_success'), $updatePost);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.update_post_error'), [], config('apps.general.error_code'));
        }
    }

    public function delete($id)
    {
        $post = Post::destroy($id);
        return response()->json($id);
    }
}