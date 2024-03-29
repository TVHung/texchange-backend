<?php
namespace App\Services;

use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Support\Facades\DB;
use App\Services\BaseService;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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
        $arrayObjProductId = Profile::where('user_id', $user_id)->get(['product_id']);
        $array_productId = array();
        foreach ($arrayObjProductId as $key => $value) {
            array_push($array_productId, $value->product_id);
        }
        return Product::whereIn('id', $array_productId)->get(); 
    }
    
    public function create ($request, $user_id){
        try {
            DB::beginTransaction();
            if(!$this->profileRepo->isExists($user_id)){
                $profileData = [
                    'user_id' => $user_id,
                    'name' => $request->input('name'),
                    'sex' => $request->input('sex'),
                    'avatar_url' => null,
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'facebook_url' => $request->input('facebook_url')
                ];
                // if($request->file('avatar') != null || $request->file('avatar') != ""){
                //     $uploadedFileImageUrl = Cloudinary::upload($request->file('avatar')->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
                //     $profileData['avatar_url'] = $uploadedFileImageUrl;
                // }
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

    public function update($id, array $product_data){
        $product = tap(Profile::where('id', $id))->update($product_data);
        return response()->json($product);
    }

    public function updateAvatar($user_id, $avatar){
        if($avatar){
            try {
                DB::beginTransaction();
                $profile = $this->get($user_id);
                $profile->avatar_url = $avatar;
                $profile->save();
                DB::commit();
                return $this->sendResponse(config('apps.message.success'), $avatar);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError(config('apps.message.error'));
            }
        }else{
            return $this->sendError(config('apps.message.error'));
        }
    }

    public function updateUserProfile($user_id, $request){
        try{
            DB::beginTransaction();
            $updateData = [
                'name' => $request->input('name'),
                'sex' => $request->input('sex'),
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