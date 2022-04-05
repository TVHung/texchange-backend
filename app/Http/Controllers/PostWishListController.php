<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PostWishListService;
use App\Repositories\PostWishListRepository;
use App\Http\Resources\PostWishListCollection;
use App\Http\Resources\PostWishListResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\PostWishList;
use App\Models\Post;
use App\Services\PostService;
use App\Repositories\PostRepository;

class PostWishListController extends Controller
{
    protected $postWishListService;
    protected $postWishListRepo;
    public function __construct(PostWishListService $postWishListService, PostWishListRepository $postWishListRepo, PostService $postService, PostRepository $postRepo){
        $this->postWishListService = $postWishListService;
        $this->postWishListRepo = $postWishListRepo;
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
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $wishlist = $this->postWishListService->getAllWishList($user_id);
            return (new PostCollection($wishlist))->response();
        }else{
            return null;
        }
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
            'post_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        //kiem tra su ton tai 
        $exist = $this->postWishListRepo->isExistPost(Auth::user()->id, $request->input('post_id'));
        if($exist) return response()->json("Post is exist");
        else
            try{
                DB::beginTransaction();
                $user_id = Auth::user()->id;
                $postWishList = new PostWishList();
                $postWishList->user_id = $user_id;
                $postWishList->post_id = $request->input('post_id');
                $postWishList->save();
                // $postWishList = $this->postWishListRepo->store($request);
                DB::commit();
                return (new PostWishListResource($postWishList))->response();
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_id = $this->postWishListService->delete($id);
        return response()->json($post_id);
    }
}
