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

class PostController extends Controller
{
    protected $postService;
    protected $postRepo;
    public function __construct(PostService $postService, PostRepository $postRepo){
        $this->postService = $postService;
        $this->postRepo = $postRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->getAll();
        return (new PostCollection($posts))->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        DB::beginTransaction();
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
        $post->save();
        
        $cate = $request->input('category_id');
        $post_id = $post->id;
        if($cate == 1){
            $post_mobile = new PostMobile();
            $post_mobile->post_id = $post_id;
            $post_mobile->color = $request->input('color');
            $post_mobile->brand_id = $request->input('brand_id');
            $post_mobile->save();
            DB::commit();
        }else if($cate == 2){
            $post_laptop = new PostLaptop();
            $post_laptop->post_id = $post_id;
            $post_laptop->color = $request->input('color');
            $post_laptop->cpu = $request->input('cpu');
            $post_laptop->gpu = $request->input('gpu');
            $post_laptop->storage_type = $request->input('storage_type');
            $post_laptop->brand_id = $request->input('brand_id');
            $post_laptop->display_size = $request->input('display_size');
            $post_laptop->save();
            DB::commit();
        }else if($cate == 3){
            $post_pc = new PostPc();
            $post_pc->post_id = $post_id;
            $post_pc->cpu = $request->input('cpu');
            $post_pc->gpu = $request->input('gpu');
            $post_pc->storage_type = $request->input('storage_type');
            $post_pc->save();
            DB::commit();
        }else{
            //rollback
            DB::rollback();
        }
        return (new PostResource($post))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepo->getById($id);
        return (new PostResource($post))->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = $this->postService->update($id, $input);
        return (new PostResource($post))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
