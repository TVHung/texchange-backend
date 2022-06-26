<?php
namespace App\Services;

use App\Models\User;
use App\Models\Profile;
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
        $allParameters = \Request::query();
        $user = User::query();
        if (array_key_exists('is_block', $allParameters)) {
            $user->where('is_block', $allParameters['is_block']);
        }
        if (array_key_exists('is_admin', $allParameters)) {
            $user->where('is_admin', $allParameters['is_admin']);
        }
        return $user->paginate(config('constants.paginate'));
    }

    public function getCount()
    {
        $user_count = User::count();
        return $user_count - 1;
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

    public function getUserRecently(){
        try {
            DB::beginTransaction();
            $users = Profile::orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), $users);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError(config('apps.message.not_complete'));
        }
    }
}