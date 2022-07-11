<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Services\CommentService;
use App\Services\BaseService;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Events\CommentEvent;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    protected $commentService;
    protected $baseService;
    public function __construct(CommentService $commentService, BaseService $baseService){
        $this->commentService = $commentService;
        $this->baseService = $baseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommentProduct($id)
    {
        try{
            DB::beginTransaction();
            $comments = $this->commentService->getCommentProduct($id);
            DB::commit();
            return new CommentCollection($comments);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
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
            'product_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'content' => 'bail|required|string',
            'comment_parent_id' => $request->input('comment_parent_id') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail'
        ],
        [
            //require
            'product_id.required'=> config('apps.validation.feild_require'), 
            'content.required'=> config('apps.validation.feild_require'), 
            //string
            'content.string'=> config('apps.validation.feild_is_string'), 
            //number
            'product_id.regex'=> config('apps.validation.feild_is_number'),
            'comment_parent_id.regex'=> config('apps.validation.feild_is_number'),
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            $comment = $this->commentService->create($request, $user_id);
            event(new CommentEvent($request->input('content'), (int)$request->input('product_id')));
            DB::commit();
            return $comment;
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
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
        $comment = $this->commentService->get($id);
        return $comment;
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
        $validator = Validator::make($request->all(), [
            'content' => 'bail|required|string',
        ],
        [
            //require
            'content.required'=> config('apps.validation.feild_require'), 
            //string
            'content.string'=> config('apps.validation.feild_is_string'), 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            $comment = $this->commentService->update($request, $id, $user_id);
            DB::commit();
            return $this->baseService->sendResponse(config('apps.message.success'), $comment);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
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
            $delete_comment = $this->commentService->delete($id, $user_id);
            return $delete_comment;
        }else{
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }
}
