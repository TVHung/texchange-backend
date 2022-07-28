<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
/**
 * Class ChatRepository.
 */
class ChatRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Message::class);  //đinh nghĩa model Product
        $this->fields = $this->getInstance()->getFillable();
    }

    public function getAllChatTargetUserId($user_id, $target_user_id) {
        $messages = $this->getModel()::where(function($query) use ($user_id, $target_user_id) {
                                return $query
                                    ->where('user_id', '=', (int)$user_id)
                                    ->where('target_user_id', '=', (int)$target_user_id);
                                })
                            ->orWhere(function($query) use ($user_id, $target_user_id) {
                                return $query
                                    ->where('user_id', '=', (int)$target_user_id)
                                    ->where('target_user_id', '=', (int)$user_id);
                                })
                            ->orderBy('created_at', 'asc')
                            // ->paginate(config('constants.paginate_message'));
                            ->get();
        return $messages;
    }

    public function getMyListConversation($user_id){
        $conversations1 = $this->getModel()::select('target_user_id')
                            ->where('user_id','=', $user_id)
                            ->groupBy('target_user_id')
                            ->get();
        $conversations2 = $this->getModel()::select('user_id')
                            ->where('target_user_id','=', $user_id)
                            ->groupBy('user_id')
                            ->get();
        $array_id_1 = [];
        foreach ($conversations1 as $id) {
            array_push($array_id_1, $id->target_user_id);
        }
        $array_id_2 = [];
        foreach ($conversations2 as $id) {
            array_push($array_id_2, $id->user_id);
        }
        for ($i=0; $i < count($array_id_2); $i++) { 
            if(!in_array($array_id_2[$i], $array_id_1))
                array_push($array_id_1, $array_id_2[$i]);
        }
        return $array_id_1;
    }
    public function getLastMessage($user_id, $target_user_id)
    {
        $lastMessage = $this->getModel()::where(function($query) use ($user_id, $target_user_id) {
                                return $query
                                    ->where('user_id', '=', (int)$user_id)
                                    ->where('target_user_id', '=', (int)$target_user_id);
                                })
                            ->orWhere(function($query) use ($user_id, $target_user_id) {
                                return $query
                                    ->where('user_id', '=', (int)$target_user_id)
                                    ->where('target_user_id', '=', (int)$user_id);
                                })
                            ->orderBy('created_at', 'desc')->first();
        return $lastMessage;
    }


    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = Message::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return Message::where('id', $id)->exists();
    }
}
