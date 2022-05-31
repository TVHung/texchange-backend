<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Services\FileUploadService;
use App\Repositories\ProfileRepository;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    protected $profileService;
    protected $profileRepo;
    protected $baseService;
    protected $fileUploadService;
    public function __construct(ProfileService $profileService, ProfileRepository $profileRepo, BaseService $baseService, FileUploadService $fileUploadService){
        $this->profileService = $profileService;
        $this->profileRepo = $profileRepo;
        $this->baseService = $baseService;
        $this->fileUploadService = $fileUploadService;
    }
    
    //get profile current user
    public function getProfile()
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $profile = $this->profileService->getProfileUser($user_id);
            return $profile;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }

    public function changeAvatar(Request $request)
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $avatar = $this->fileUploadService->imageUpload($request);
            $updateAvatar = $this->profileService->updateAvatar($user_id, $avatar);
            return $updateAvatar;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }

    //get profile any user
    public function show($id)
    {
        $profile = $this->profileService->get($id);
        return $profile;
    }

    public function updateProfileUser(Request $request){
        // dd($request->all());
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'sex' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
                'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'address' => 'nullable|string',
                'facebook_url' => 'nullable|string',
            ],
            [
                //require
                'name.required'=> config('apps.validation.feild_require'), 
                //string
                'name.string'=> config('apps.validation.feild_is_string'), 
                'address.string'=> config('apps.validation.feild_is_string'), 
                'facebook_url.string'=> config('apps.validation.feild_is_string'), 
                //number
                'phone.regex'=> config('apps.validation.feild_wrong_phone'), 
                'sex.regex'=> config('apps.validation.feild_is_number'),
                //min
                'phone.min'=> config('apps.validation.feild_wrong_phone'), 
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $user_id = Auth::user()->id;
            $updateProfile = $this->profileService->updateUserProfile($user_id, $request);
            return $updateProfile;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }

    public function createProfile(Request $request)
    {
        if (Auth::check()){
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required|string',
                'sex' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
                'phone' => 'bail|string',
                'address' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
                'facebook_url' => 'bail|string',
            ],
            [
                //require
                'name.required'=> config('apps.validation.feild_require'), 
                //string
                'name.string'=> config('apps.validation.feild_is_string'), 
                'phone.string'=> config('apps.validation.feild_is_string'), 
                'address.string'=> config('apps.validation.feild_is_string'), 
                'facebook_url.string'=> config('apps.validation.feild_is_string'), 
                //number
                'sex.regex'=> config('apps.validation.feild_is_number'),
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $user_id = Auth::user()->id;
            $profile = $this->profileService->create($request, $user_id);
            return $profile;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }
}
