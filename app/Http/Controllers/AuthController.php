<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use Validator;
use App\Services\BaseService;
use Hash;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    protected $baseService;
    public function __construct(BaseService $baseService) {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->baseService = $baseService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ],
        [
            //require
            'email.required'=> config('apps.validation.feild_require'), 
            'password.required'=> config('apps.validation.feild_require'), 
            //email
            'email.email'=> config('apps.validation.feild_is_email'), 
            //string
            'password.string'=> config('apps.validation.feild_is_string'), 
            //min
            'password.min'=> config('apps.validation.feild_min_6'), 
        ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        if (! $token = auth()->attempt($validator->validated())) {
            return $this->baseService->sendError(config('apps.message.login_error'), [], config('apps.general.error_code'));
        }
        return $this->createNewToken($token);
        // return $this->baseService->sendResponse(config('apps.message.login_success'), $this->createNewToken($token));
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ],
        [
            //require
            'name.required'=> config('apps.validation.feild_require'), 
            'email.required'=> config('apps.validation.feild_require'), 
            'password.required'=> config('apps.validation.feild_require'), 
            //email
            'email.email'=> config('apps.validation.feild_is_email'), 
            'email.unique'=> config('apps.validation.exsist_email'), 
            //string
            'name.string'=> config('apps.validation.feild_is_string'), 
            'password.string'=> config('apps.validation.feild_is_string'), 
            //confirm
            'password.confirmed'=> config('apps.validation.confirm_pass_wrong'), 
            //min
            'name.min'=> config('apps.validation.feild_min_6'), 
            'password.min'=> config('apps.validation.feild_min_6'), 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        //create profile
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->name = $request->input('name');
        $profile->sex = 10;
        $profile->phone = "";
        $profile->address = "";
        $profile->avatar_url = "https://res.cloudinary.com/trhung/image/upload/v1650219626/rvo0ufooowdf3ur0ltpf.jpg";
        $profile->save();

        return $this->baseService->sendResponse(config('apps.message.register_success'), $user);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 24,
            'user' => auth()->user()
        ]);
    }

    public function changePassWord(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|confirmed|min:6',
        ],
        [
            //require
            'old_password.required'=> config('apps.validation.feild_require'), 
            'new_password.required'=> config('apps.validation.feild_require'), 
            //string
            'old_password.string'=> config('apps.validation.feild_is_string'), 
            'new_password.string'=> config('apps.validation.feild_is_string'), 
            //confirm
            'new_password.confirmed'=> config('apps.validation.confirm_pass_wrong'), 
            //min
            'old_password.min'=> config('apps.validation.feild_min_6'), 
            'new_password.min'=> config('apps.validation.feild_min_6'), 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return $this->baseService->sendError(config('apps.message.password_not_match'), [], config('apps.general.error_code'));
        }

        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return $this->baseService->sendResponse(config('apps.message.update_password_success'), $user);
    }
}