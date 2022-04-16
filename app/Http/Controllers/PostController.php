<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use App\Models\Post;
use App\Models\PostMobile;
use App\Models\PostLaptop;
use App\Models\PostPc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    protected $postService;
    protected $postRepo;
    public function __construct(PostService $postService, PostRepository $postRepo){
        $this->postService = $postService;
        $this->postRepo = $postRepo;
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
        try {
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
            // dd("a");
            DB::beginTransaction();
            if(Auth::check()){
                $user_id = Auth::user()->id;
                $post = new Post();
                $post->user_id = $user_id;
                $post->is_trade = $request->input('is_trade') ?? null;
                $post->post_trade_id = $request->input('post_trade_id');
                $post->title = $request->input('title');
                $post->category_id = $request->input('category_id');
                $post->name = $request->input('name');
                $post->description = $request->input('description');
                $post->ram = $request->input('ram');
                $post->storage = $request->input('storage');
                $post->video_url = $request->input('video_url');
                $post->status = $request->input('status');
                $post->price = $request->input('price');
                $post->address = $request->input('address');
                $post->public_status = $request->input('public_status');
                $post->guarantee = $request->input('guarantee');
                $post->color = $request->input('color');
                $post->cpu = $request->input('cpu');
                $post->gpu = $request->input('gpu');
                $post->storage_type = $request->input('storage_type');
                $post->brand_id = $request->input('brand_id');
                $post->display_size = $request->input('display_size');
                $post->save();
                DB::commit();
                return (new PostResource($post))->response();
            }         
        } catch (\Exception $e) {
            DB::rollBack();
            return "Thất bại";
        }
    }

    public function show($id)
    {
        $post = $this->postRepo->getById($id);
        return (new PostResource($post))->response();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = $this->postService->update($id, $input);
        return (new PostResource($post))->response();
    }

    public function destroy($id)
    {
        $post = $this->postService->delete($id);
    }

    public function filter(Request $request)
    {
       $posts = Post::filterPost($request);
       return (new PostCollection($posts))->response();
    }
}
