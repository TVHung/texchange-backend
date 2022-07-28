<?php
namespace App\Services;

use App\Models\Message;
use App\Repositories\ChatRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;
use App\Http\Resources\UserResource;
class ChatService extends BaseService
{
    private $chatRepo;
    private $userRepo;
    public function __construct(ChatRepository $chatRepo, UserRepository $userRepo)
    {
        $this->chatRepo = $chatRepo;
        $this->userRepo = $userRepo;
    }

    public function getAllChatTargetUserId($user_id, $target_user_id) {
        if($this->userRepo->isExists($target_user_id)){
            $allMess = $this->chatRepo->getAllChatTargetUserId((int)$user_id, (int)$target_user_id);
            return $this->sendResponse(config('apps.message.success'), $allMess);
        }else{
            return $this->sendError(config('apps.message.not_exist'));
        }
    }

    public function createMess($request, $user_id, $uploadedFileUrl){
        if($this->userRepo->isExists((int)($request->input('target_user_id')))){
            $messageData = [
                'message' => $request->input('message'),
                'image_url' => $uploadedFileUrl ?? null,
                'user_id' => (int)($user_id),
                'target_user_id' => (int)($request->input('target_user_id'))
            ];
            return $this->chatRepo->store($messageData);
        }else{
            return $this->sendError(config('apps.message.not_exist'));
        }
    }

    public function getMyListConversation($user_id){
        $all = $this->chatRepo->getMyListConversation($user_id);
        $array_user = [];
        for ($i=0; $i < count($all); $i++) { 
            $user = new UserResource($this->userRepo->getById($all[$i]));
            $lastMessage = $this->chatRepo->getLastMessage($user_id, $all[$i]);
            $user->lastMessage = $lastMessage;
            // dd($user_id, $all[$i]);
            $data = [
                'user' => $user,
                'lastMessage' => $lastMessage
            ];
            array_push($array_user, $data);
        }
        return $array_user;

    }

    public function deleteConversation($id, $user_id){
        Message::where('user_id', $user_id)->where('target_user_id', $id)->delete();
        Message::where('target_user_id', $user_id)->where('user_id', $id)->delete();
        return $this->sendResponse(config('apps.message.success'), []);
    }
}