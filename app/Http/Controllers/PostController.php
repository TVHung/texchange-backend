<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use App\Services\BaseService;
use App\Models\Post;
use App\Models\PostMobile;
use App\Models\PostLaptop;
use App\Models\PostPc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Post\PostRequest;
class PostController extends Controller
{
    protected $postService;
    protected $postRepo;
    protected $baseService;
    public function __construct(PostService $postService, PostRepository $postRepo, BaseService $baseService){
        $this->postService = $postService;
        $this->postRepo = $postRepo;
        $this->baseService = $baseService;
    }

    public function all()
    {
        if(Auth::user()->is_admin == 1){
            $posts = $this->postService->getAllAdmin();
            return (new PostCollection($posts))->response();
        }
        return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
    }
    
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = $this->postService->getAll($user_id);
            return (new PostCollection($posts))->response();
        }else{
            $posts = $this->postService->getAllWithoutLogin();
            return (new PostCollection($posts))->response();
        }
    }

    public function getRecentlyPosts()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = $this->postService->getRecentlyPosts($user_id);
            return (new PostCollection($posts))->response();
        }else{
            $posts = $this->postService->getRecentlyPosts();
            return (new PostCollection($posts))->response();
        }
    }

    public function getPostHasTrade()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = $this->postService->getPostHasTrade($user_id);
            return (new PostCollection($posts))->response();
        }else{
            $posts = $this->postService->getPostHasTrade();
            return (new PostCollection($posts))->response();
        }
    }

    public function getRecommendPosts()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = $this->postService->getRecentlyPosts($user_id);
            return (new PostCollection($posts))->response();
        }else{
            $posts = $this->postService->getRecentlyPosts();
            return (new PostCollection($posts))->response();
        }
    }

    public function getCategoryPosts($id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = $this->postService->getPostCategory($user_id, $id);
            return (new PostCollection($posts))->response();
        }else{
            $posts = $this->postService->getPostCategory($id);
            return (new PostCollection($posts))->response();
        }
    }

    public function setBlockPost(Request $request)
    {
        $result = $this->postService->setBlock($request);
        return $result; 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'name' => 'bail|required|string',
            'status' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'guarantee' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
        ],
        [
            //require
            'category_id.required'=> config('apps.validation.feild_require'), 
            'name.required'=> config('apps.validation.feild_require'), 
            'status.required'=> config('apps.validation.feild_require'), 
            'address.required'=> config('apps.validation.feild_require'), 
            'price.required'=> config('apps.validation.feild_require'), 
            'title.required'=> config('apps.validation.feild_require'), 
            'description.required'=> config('apps.validation.feild_require'), 
            //string
            'name.string'=> config('apps.validation.feild_is_string'), 
            'address.string'=> config('apps.validation.feild_is_string'), 
            'title.string'=> config('apps.validation.feild_is_string'), 
            'description.string'=> config('apps.validation.feild_is_string'), 
            //number
            'post_id.regex'=> config('apps.validation.feild_is_number'),
            'category_id.regex'=> config('apps.validation.feild_is_number'), 
            'status.regex'=> config('apps.validation.feild_is_number'), 
            'guarantee.regex'=> config('apps.validation.feild_is_number'), 
            'price.regex'=> config('apps.validation.feild_is_number'), 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $newPost = $this->postService->create($request, $user_id);
            return $newPost;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }         
    }

    public function show($id)
    {
        $post = $this->postService->get($id);   
        return $post;
    }

    public function getPostEdit($id)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $post = $this->postService->getWithEdit($id, $user_id);
            return $post;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }        
        
    }

    public function getMyPosts()
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $myPosts = $this->postService->getUserPosts($user_id);
            return (new PostCollection($myPosts))->response();
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }    
    }

    public function getUserPosts($id)
    {
        $userPosts = $this->postService->getUserPosts($id);
        return (new PostCollection($userPosts))->response();
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->input('fileVideo'));
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string',
            'status' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
        ],
        [
            //require
            'category_id.required'=> config('apps.validation.feild_require'), 
            'name.required'=> config('apps.validation.feild_require'), 
            'status.required'=> config('apps.validation.feild_require'), 
            'address.required'=> config('apps.validation.feild_require'), 
            'price.required'=> config('apps.validation.feild_require'), 
            'title.required'=> config('apps.validation.feild_require'), 
            'description.required'=> config('apps.validation.feild_require'), 
            //string
            'name.string'=> config('apps.validation.feild_is_string'), 
            'address.string'=> config('apps.validation.feild_is_string'), 
            'title.string'=> config('apps.validation.feild_is_string'), 
            'description.string'=> config('apps.validation.feild_is_string'), 
            //number
            'post_id.regex'=> config('apps.validation.feild_is_number'),
            'category_id.regex'=> config('apps.validation.feild_is_number'), 
            'status.regex'=> config('apps.validation.feild_is_number'), 
            'guarantee.regex'=> config('apps.validation.feild_is_number'), 
            'price.regex'=> config('apps.validation.feild_is_number'), 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updatePost = $this->postService->update($user_id, $id, $request);
            return $updatePost;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }         
        return $this->baseService->sendError(config('apps.message.update_post_error'), [], config('apps.general.error_code'));
    }

    public function destroy($id)
    {
        $post_id = $this->postService->delete($id);
        if($post_id)
            return $this->baseService->sendResponse(config('apps.message.delete_post_success'), $id);
        return $this->baseService->sendError(config('apps.message.delete_post_error'), [], config('apps.general.error_code'));
    }

    public function filter(Request $request)
    {
       $posts = Post::filterPost($request);
       return (new PostCollection($posts))->response();
    }
}
