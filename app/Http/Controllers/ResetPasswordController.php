<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email',
        ],
        [
            'email.required'=> config('apps.validation.feild_require'), 
            'email.email'=> config('apps.validation.feild_is_email'), 
        ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
            ]);
            if ($passwordReset) {
                $user->notify(new ResetPasswordRequest($passwordReset->token));
            }
            return response()->json([
                'status' => config('apps.general.success'),
                'message' => config('apps.message.sent_email_reset_password')
            ]);
        }
        return response()->json([
            'status' => config('apps.general.error'),
            'message' => config('apps.message.email_ivalid')
        ]);
    }

    public function reset(Request $request, $token)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'bail|required|confirmed|string|min:6',
        ],
        [
            'password.required'=> config('apps.validation.feild_require'), 
            'password.string'=> config('apps.validation.feild_is_string'), 
            'password.min'=> config('apps.validation.feild_min_6'), 
            'password.confirmed'=> config('apps.validation.confirm_pass_wrong'), 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $new_password = $request->input('password');
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            
            return response()->json([
                'status' => config('apps.general.error'),
                'message' => config('apps.message.token_ivalid'),
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $updatePasswordUser = $user->update(['password' => bcrypt($new_password)]);
        $passwordReset->delete();

        return response()->json([
            'status' => config('apps.general.success'),
            'message' => config('apps.message.reset_password_success'),
        ]);
    }
}