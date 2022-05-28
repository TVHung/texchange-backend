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
        return User::find($id);
    }

    public function getAll()
    {
        return User::all();
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
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError(config('apps.message.not_complete'));
            }
        }else{
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function update($id, array $user_data){
        $user = tap(User::where('id', $id))->update($user_data);
        return response()->json($user);
    }

    public function delete($id)
    {
        $user = User::destroy($id);
        return response()->json($id);
    }
}