<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Services\BaseService;
use App\Events\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
    protected $ChatService;
    protected $baseService;
    public function __construct(ChatService $ChatService, BaseService $baseService){
        $this->ChatService = $ChatService;
        $this->baseService = $baseService;
    }

    public function createConversation (Request $request) {
        
    }

    public function allMessageWithConversationId (Request $request) {
        return "allMessageWithConversationId";

    }

    public function getMyListConversation () {
        return "getMyListConversation";
    }

    public function sendMessage (Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'message' => 'bail|required|string',
            // 'conversation_id' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
        ],
        [
            //require
            'message.required'=> config('apps.validation.feild_require'), 
            // 'conversation_id.required'=> config('apps.validation.feild_require'), 
            //string
            'message.string'=> config('apps.validation.feild_is_string'), 
            //number
            // 'conversation_id.regex'=> config('apps.validation.feild_is_number'),
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            event(new Message($request->input('message')));
            DB::commit();
            return [];
        } catch (\Exception $e) {
            DB::rollback();
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }

    public function deleteMessage ($id) {
        return "deleteMessage";

    }
}


