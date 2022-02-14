<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostLaptopCollection;
use App\Http\Resources\PostLaptopResource;
use App\Services\PostLaptopService;
use App\Models\PostLaptop;
use Illuminate\Support\Facades\Auth;

class PostLaptopController extends Controller
{
    protected $postLaptopService;
    public function __construct(PostLaptopService $postLaptopService){
        $this->postLaptopService = $postLaptopService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_laptops = $this->postLaptopService->getAll();
        return (new PostLaptopCollection($post_laptops))->response();
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
        $post_laptop = new PostLaptop();
        $post_laptop->post_id = $request->input('post_id');
        $post_laptop->color = $request->input('color');
        $post_laptop->cpu = $request->input('cpu');
        $post_laptop->gpu = $request->input('gpu');
        $post_laptop->storage_type = $request->input('storage_type');
        $post_laptop->brand_id = $request->input('brand_id');
        $post_laptop->display_size = $request->input('display_size');
        $post_laptop->save();
        return (new PostLaptopResource($post_laptop))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_laptop = $this->postLaptopService->get($id);
        return (new PostLaptopResource($post_laptop))->response();
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
        $post_laptop = $this->postLaptopService->update($id, $input);
        return (new PostLaptopResource($post_laptop))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_laptop = $this->postLaptopService->delete($id);
    }
}
