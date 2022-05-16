<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostTradeCollection;
use App\Http\Resources\PostTradeResource;
use App\Services\PostTradeService;
use App\Services\BaseService;
use App\Models\PostTrade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\PostTradeRepository;
use Illuminate\Support\Facades\Validator;

class PostTradeController extends Controller
{

    protected $postTradeService;
    protected $postTradeRepo;
    protected $baseService;
    public function __construct(PostTradeService $postTradeService, PostTradeRepository $postTradeRepo, BaseService $baseService){
        $this->postTradeService = $postTradeService;
        $this->postTradeRepo = $postTradeRepo;
        $this->baseService = $baseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->postTradeService->getAll(); 
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
            'category_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'name' => 'bail|required|string',
            'title' => 'bail|required|string',
            'description' => 'bail|required|string',
            'guarantee' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $newPostTrade = $this->postTradeService->create($request);
            return $newPostTrade;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
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
        return $this->postTradeService->get($id);
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
        $validator = Validator::make($request->all(), [
            'category_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'name' => 'bail|required|string',
            'title' => 'bail|required|string',
            'description' => 'bail|required|string',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updatePost = $this->postTradeService->update($user_id, $id, $request);
            return $updatePost;
        }       
        return $this->baseService->sendError(config('apps.message.update_post_error'), [], config('apps.general.error_code')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            return $this->postTradeService->delete($id);
        }
        return $this->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
    }
}