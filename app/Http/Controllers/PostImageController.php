<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostImageCollection;
use App\Http\Resources\PostImageResource;
use App\Services\PostImageService;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;

class PostImageController extends Controller
{
    protected $postImageService;
    public function __construct(PostImageService $postImageService){
        $this->postImageService = $postImageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_images = $this->postImageService->getAll();
        return (new PostImageCollection($post_images))->response();
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
        // $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        // dd($response);
        // return back()->with('success', 'File uploaded successfully');
        $post_image = new PostImage();
        $post_image->post_id = $request->input('post_id');
        $post_image->is_banner = $request->input('is_banner');
        $post_image->image_url = $request->input('image_url');
        $post_image->save();
        return (new PostImageResource($post_image))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_image = $this->postImageService->get($id);
        return (new PostImageResource($post_image))->response();
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
        $post_image = $this->postImageService->update($id, $input);
        return (new PostImageResource($post_image))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $post_image = $this->postImageService->delete($id);
    }
}
