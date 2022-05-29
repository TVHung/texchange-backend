<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{

    private $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function get($id)
    {
        if($this->userRepo->isExists($id)){
            return User::find($id);
        }
        return false;
    }

    public function getAll($id)
    {
        return User::where('id', '!=', $id)->get();
    }

    public function find($id)
    {
        return User::find($id);
    }

    //block and admin user
    public function setDataUserWithAdmin($user_id, $feild){
        $is_exsist = $this->userRepo->isExists($user_id);
        if($is_exsist){
            try {
                DB::beginTransaction();
                $user = $this->find($user_id);
                // dd($user->$feild); 
                if($user->$feild){ //is blocked => set open block
                    $user->$feild = 0;
                }else{ //is not block => set block
                    $user->$feild = 1;
                }
                $user->save();
                DB::commit();
                if($feild == "is_admin")
                    return $user->$feild == 1 ? $this->sendResponse(config('apps.message.add_admin_success'), $user) : $this->sendResponse(config('apps.message.delete_admin_success'), $user);
                else
                    return $user->$feild == 1 ? $this->sendResponse(config('apps.message.block_user_success'), $user) : $this->sendResponse(config('apps.message.unblock_user_success'), $user);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError(config('apps.message.not_complete'));
            }
        }else{
            return $this->sendError(config('apps.message.not_exist'));
        }
    }

    public function update($id, array $user_data){
        $user = tap(User::where('id', $id))->update($user_data);
        return response()->json($user);
    }

    public function delete($id, $user_id, $is_admin)
    {
        if($this->userRepo->isExists($id)){
            if($is_admin == config('constants.is_admin')){
                $userDelete = User::destroy($id);
                return $this->sendResponse(config('apps.message.delete_user_success'), $id);
            }
            return $this->sendError(config('apps.message.not_role_admin'));
        }
        return $this->sendError(config('apps.message.not_exist'));
    }
}