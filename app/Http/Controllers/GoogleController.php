<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Redirect;
class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        try {
            $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
            return response()->json([
                'url' => $url,
            ])->setStatusCode(Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginCallback(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->email)
                        ->where('google_id', $googleUser->id)
                        ->first();
            if (!$user) {
                $user = User::create(
                    [
                        'email' => $googleUser->email,
                        'name' => $googleUser->name,
                        'google_id'=> $googleUser->id,
                        'password'=> bcrypt($googleUser->id),
                    ]
                );
                $profile = new Profile();
                $profile->user_id = $user->id;
                $profile->name = $user->name;
                $profile->sex = 10;
                $profile->phone = "";
                $profile->address = "";
                $profile->avatar_url = "https://res.cloudinary.com/trhung/image/upload/v1650219626/rvo0ufooowdf3ur0ltpf.jpg";
                $profile->save();
            }
            $request = new Request([
                'email'   => $user->email,
                'password' =>  $user->google_id,
            ]);
            return app('App\Http\Controllers\AuthController')->login($request);
        } catch (\Exception $exception) {
            return response()->json([
                'status' =>  config('apps.general.error'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
