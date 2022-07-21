<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Services\BaseService;
use App\Events\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class ChatController extends Controller
{
    protected $chatService;
    protected $baseService;
    public function __construct(ChatService $chatService, BaseService $baseService){
        $this->chatService = $chatService;
        $this->baseService = $baseService;
    }

    public function getAllMessBoxChat (Request $request) {
        $validator = Validator::make($request->all(), [
            'target_user_id' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
        ],
        [
            //require
            'target_user_id.required'=> config('apps.validation.feild_require'), 
            //number
            'target_user_id.regex'=> config('apps.validation.feild_is_number'),
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            $allMess = $this->chatService->getAllChatTargetUserId($user_id, $request->input('target_user_id'));
            DB::commit();
            return $allMess;
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }

    public function getMyListConversation () {
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            $conversations = $this->chatService->getMyListConversation($user_id);
            DB::commit();
            return $this->baseService->sendResponse(config('apps.message.success'), $conversations);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }

    public function sendMessage (Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'message' => 'bail|required|string',
            'target_user_id' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
        ],
        [
            //require
            'message.required'=> config('apps.validation.feild_require'), 
            'target_user_id.required'=> config('apps.validation.feild_require'), 
            //string
            'message.string'=> config('apps.validation.feild_is_string'), 
            //number
            'target_user_id.regex'=> config('apps.validation.feild_is_number'),
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            if((int)$request->input('target_user_id') != $user_id){
                $uploadedFileUrl = "";
                if($request->file('image')){
                    $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'chat_images'])->getSecurePath();
                }
                $result = $this->chatService->createMess($request, $user_id, $uploadedFileUrl);
                event(new Message($request->input('message'), $uploadedFileUrl, (int)$request->input('target_user_id'), (int)$user_id));
                DB::commit();
                return $result;
            }else
                return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }

    public function deleteMessage ($id) {
        return "deleteMessage";

    }
}


