<?php
namespace App\Services;

use App\Models\PostTrade;
use App\Repositories\PostTradeRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostTradeCollection;
use App\Http\Resources\PostTradeResource;
use Illuminate\Support\Facades\Auth;
use App\Services\PostService;

class PostTradeService extends BaseService
{
    private $postTradeRepo;
    private $postService;
    public function __construct(PostTradeRepository $postTradeRepo, PostService $postService)
    {
        $this->postTradeRepo = $postTradeRepo;
        $this->postService = $postService;
    }

    public function getAll(){
        return $this->postTradeRepo->all();
    }

    public function get($post_id)
    {
        try {
            if (!$this->postTradeRepo->isExists($post_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->postTradeRepo->getById($post_id);
            return $this->sendResponse(config('apps.message.get_post_success'), new PostTradeResource($data));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function find($id)
    {
        return PostTrade::find($id);
    }

    public function create($request)
    {
        try {
            DB::beginTransaction();
            $postData = [
                'post_id' => $request->input('post_id'),
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'guarantee' => $request->input('guarantee'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ];
            $newPost = $this->postTradeRepo->store($postData);
            DB::commit();
            return $this->sendResponse(config('apps.message.create_post_success'), new PostTradeResource($newPost));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.create_post_error'), [], config('apps.general.error_code'));
        }
    }

    public function update($user_id, $post_trade_id, $request){
        $postTrade = $this->find($post_trade_id);
        $post_user_id = $this->postService->find($postTrade->post_id)->user_id;
        // dd($post_user_id, $user_id);
        if ($post_user_id == $user_id){
            try {
                DB::beginTransaction();
                $postData = $request->only(['post_id', 'category_id', 'title', 'name', 'description', 'guarantee']);
                // dd($postData);
                $updatePostTrade = $this->postTradeRepo->updateByField('id', $post_trade_id, $postData);
                DB::commit();
                return $this->sendResponse(config('apps.message.update_post_success'), $updatePostTrade);
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->sendError(config('apps.message.update_post_error'), [], config('apps.general.error_code'));
            }
        }else{
            return $this->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }
    }

    public function delete($id)
    {
        try {
            $post = PostTrade::destroy($id);
            return $this->sendResponse(config('apps.message.success'), $post);
        } catch (\Throwable $th) {
            return $this->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }
}
