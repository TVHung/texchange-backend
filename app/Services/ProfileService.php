<?php
namespace App\Services;

use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\DB;
use App\Services\BaseService;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
class ProfileService extends BaseService
{
    private $profileRepo;
    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function get($id)
    {
        return Profile::find($id);
    }

    public function getProfileUser($user_id)
    {
        try {
            if (!$this->profileRepo->isExists($user_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->profileRepo->getByCol('user_id', $user_id);
            return $this->sendResponse(config('apps.message.success'), new ProfileResource($data));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getAllWishList($user_id)
    {
        $arrayObjPostId = Profile::where('user_id', $user_id)->get(['post_id']);
        $array_postId = array();
        foreach ($arrayObjPostId as $key => $value) {
            array_push($array_postId, $value->post_id);
        }
        return Post::whereIn('id', $array_postId)->get(); 
    }
    
    public function create ($request, $user_id){
        try {
            DB::beginTransaction();
            if(!$this->profileRepo->isExists($user_id)){
                $profileData = [
                    'user_id' => $user_id,
                    'name' => $request->input('name'),
                    'sex' => $request->input('sex'),
                    'avatar_url' => $request->input('avatar_url'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'facebook_url' => $request->input('facebook_url')
                ];
                $newProfile = $this->profileRepo->store($profileData);
                DB::commit();
                return $this->sendResponse(config('apps.message.success'), $newProfile);
            }else{
                return $this->sendError(config('apps.message.exist'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.error'));
        }
    }

    public function find($id)
    {
        return Profile::find($id);
    }

    public function update($id, array $post_data){
        $post = tap(Profile::where('id', $id))->update($post_data);
        return response()->json($post);
    }

    public function updateUserProfile($user_id, $request){
        try{
            DB::beginTransaction();
            $updateData = [
                'user_id' => $user_id,
                'name' => $request->input('name'),
                'sex' => $request->input('sex'),
                'avatar_url' => $request->input('avatar_url'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'facebook_url' => $request->input('facebook_url')
            ];
            $profile = tap(Profile::where('user_id', $user_id))->update($updateData);
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), $profile);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->sendError(config('apps.message.error'));
        }
    }
}