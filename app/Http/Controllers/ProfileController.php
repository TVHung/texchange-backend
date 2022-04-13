<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Repositories\ProfileRepository;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    protected $profileService;
    protected $profileRepo;
    public function __construct(ProfileService $profileService, ProfileRepository $profileRepo){
        $this->profileService = $profileService;
        $this->profileRepo = $profileRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $profile = $this->profileService->getProfileUser($user_id);
            return (new ProfileResource($profile))->response();
        }else{
            
        }
    }

    public function updateProfileUser(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updateProfile = $this->profileService->updateUserProfile($user_id, $request);
        }
        return $updateProfile;
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
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $profile = $this->profileService->create($request, $user_id);
        }else{
            
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = $this->profileService->delete($id);
    }
}
