<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
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
        $user_id = Auth::user()->id;
        $post = new Post();
        $post->user_id = $user_id;
        $post->is_trade = $request->input('is_trade');
        $post->post_trade_id = $request->input('post_trade_id');
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->ram = $request->input('ram');
        $post->storage_id = $request->input('storage_id');
        $post->status_id = $request->input('status_id');
        $post->price = $request->input('price');
        $post->address_id = $request->input('address_id');
        $post->public_status = $request->input('public_status');
        $post->guarantee = $request->input('guarantee');
        $post->save();
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
        $post = $this->postService->get($id);
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
}
