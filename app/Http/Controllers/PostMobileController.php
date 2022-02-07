<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostMobileCollection;
use App\Http\Resources\PostMobileResource;
use App\Services\PostMobileService;
use App\Models\PostMobile;
use Illuminate\Support\Facades\Auth;

class PostMobileController extends Controller
{
    protected $postMobileService;
    public function __construct(PostMobileService $postMobileService){
        $this->postMobileService = $postMobileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_mobiles = $this->postMobileService->getAll();
        return (new PostMobileCollection($post_mobiles))->response();
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
        $post_mobile = new PostMobile();
        $post_mobile->post_id = $request->input('post_id');
        $post_mobile->color = $request->input('color');
        $post_mobile->brand_id = $request->input('brand_id');
        $post_mobile->save();
        return (new PostMobileResource($post_mobile))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_mobile = $this->postMobileService->get($id);
        return (new PostMobileResource($post_mobile))->response();
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
        $post_mobile = $this->postMobileService->update($id, $input);
        return (new PostMobileResource($post_mobile))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_mobile = $this->postMobileService->delete($id);
    }
}
