<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Repositories\ProfileRepository;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;
class ProfileController extends Controller
{
    protected $profileService;
    protected $profileRepo;
    protected $baseService;
    public function __construct(ProfileService $profileService, ProfileRepository $profileRepo, BaseService $baseService){
        $this->profileService = $profileService;
        $this->profileRepo = $profileRepo;
        $this->baseService = $baseService;
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

    public function updateProfileUser(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updateProfile = $this->profileService->updateUserProfile($user_id, $request);
            return $updateProfile;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $profile = $this->profileService->create($request, $user_id);
            return $profile;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }
}
