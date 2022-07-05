<?php
namespace App\Services;

use App\Models\Message;
use App\Repositories\ChatRepository;
use Illuminate\Support\Facades\DB;
use App\Services\BaseService;
class ChatService extends BaseService
{
    private $chatRepo;
    public function __construct(ChatRepository $chatRepo)
    {
        $this->chatRepo = $chatRepo;
    }

    
}