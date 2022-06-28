<?php
namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\DB;
use App\Services\BaseService;
class CommentService extends BaseService
{
    private $commentRepo;
    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function get($id)
    {
        return Comment::find($id);
    }

    public function create ($request, $user_id){
        try {
            DB::beginTransaction();
            $commentData = [
                'user_id' => $user_id,
                'product_id' => $request->input('product_id'),
                'comment_parent_id' => $request->input('comment_parent_id'),
                'content' => $request->input('content'),
            ];
            $newComment = $this->commentRepo->store($commentData);
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), $newComment);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.error'));
        }
    }

    public function find($id)
    {
        return Comment::find($id);
    }

    public function update($request, $id, $user_id){
        if($this->commentRepo->isExists($id)){
            $comment = Comment::find($id); 
            if($user_id == $comment->user_id){
                $comment->content = $request->input('content');
                $comment->save();
                return $this->sendResponse(config('apps.message.success'), $comment);
            }
            return $this->sendError(config('apps.message.not_role_admin'));
        }
        return $this->sendError(config('apps.message.error'));
    }

    public function delete($id, $user_id)
    {
        if($this->commentRepo->isExists($id)){
            $comment = Comment::find($id); 
            if($user_id == $comment->user_id){
                $commentDelete = Comment::destroy($id);
                return $this->sendResponse(config('apps.message.success'), $id);
            }
            return $this->sendError(config('apps.message.not_role_admin'));
        }
        return $this->sendError(config('apps.message.error'));
    }
}