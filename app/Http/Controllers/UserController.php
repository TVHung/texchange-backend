<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Services\BaseService;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    protected $baseService;
    public function __construct(UserService $userService, BaseService $baseService)
    {
        $this->userService = $userService;
        $this->baseService = $baseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == config('constants.is_admin')){
                $users = $this->userService->getAll(Auth::user()->id);
                return (new UserCollection($users))->response();
            }
            return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }   
    }

    public function setBlockUser($id)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == config('constants.is_admin')){
                if(Auth::user()->id != $id){
                    $users = $this->userService->setDataUserWithAdmin($id, 'is_block');
                    return $users;
                }
                return $this->baseService->sendError(config('apps.message.not_complete'), [], config('apps.general.error_code'));
            }
            return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }   
    }

    public function setAdminUser($id)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == config('constants.is_admin')){
                if(Auth::user()->id != $id){
                    $users = $this->userService->setDataUserWithAdmin($id, 'is_admin');
                    return $users;
                }
                return $this->baseService->sendError(config('apps.message.not_complete'), [], config('apps.general.error_code'));
            }
            return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->get($id);
        if($user)
            return (new UserResource($user))->response();
        return $this->baseService->sendError(config('apps.message.not_exist'), [], config('apps.general.error_code'));
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
            'name' => 'required',
            'email' => 'required|string|email',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $input = $request->all();
        $user = $this->userService->update($id, $input);
        return response()->json($user->original->first());
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
            $is_admin = Auth::user()->is_admin;
            if($id != $user_id){
                $user_id = $this->userService->delete($id, $user_id, $is_admin);
                return $user_id;
            }
            return $this->baseService->sendError(config('apps.message.delete_user_error'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.delete_user_error'), [], config('apps.general.error_code'));
        }
    }

    public function getRecentlyDashboard()
    {
        $users = $this->userService->getUserRecently();
        return $users;
    }
}
