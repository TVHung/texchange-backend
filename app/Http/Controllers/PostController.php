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
    
    public function index()
    {
        $posts = $this->postService->getAll();
        return (new PostCollection($posts))->response();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string',
            'status' => 'bail|required|string',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $newPost = $this->postService->create($request, $user_id);
            return $newPost;
        }         
    }

    public function show($id)
    {
        $post = $this->postService->get($id);
        return $post;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string',
            'status' => 'bail|required|string',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updatePost = $this->postService->update($user_id, $id, $request);
            return $updatePost;
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
