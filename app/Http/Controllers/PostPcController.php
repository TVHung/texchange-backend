<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostPcCollection;
use App\Http\Resources\PostPcResource;
use App\Services\PostPcService;
use App\Models\PostPc;
use Illuminate\Support\Facades\Auth;

class PostPcController extends Controller
{
    protected $postPcService;
    public function __construct(PostPcService $postPcService){
        $this->postPcService = $postPcService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_pcs = $this->postPcService->getAll();
        return (new PostPcCollection($post_pcs))->response();
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
        $post_pc = new PostPc();
        $post_pc->post_id = $request->input('post_id');
        $post_pc->cpu = $request->input('cpu');
        $post_pc->gpu = $request->input('gpu');
        $post_pc->storage_type = $request->input('storage_type');
        $post_pc->save();
        return (new PostPcResource($post_pc))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_pc = $this->postPcService->get($id);
        return (new PostPcResource($post_pc))->response();
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
        $post_pc = $this->postPcService->update($id, $input);
        return (new PostPcResource($post_pc))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_pc = $this->postPcService->delete($id);
    }
}
