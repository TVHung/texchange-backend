<?php
namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;

class PostService extends BaseService
{
    private $postRepo;
    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function get($post_id)
    {
        try {
            if (!$this->postRepo->isExists($post_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->postRepo->getById($post_id);
            return $this->sendResponse(config('apps.message.get_post_success'), new PostResource($data));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getAll()
    {
        return Post::all()
            ->where('is_trade', '=', 0)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0);
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function create($request, $user_id)
    {
        try {
            DB::beginTransaction();
            $postData = [
                'user_id' => $user_id,
                'is_trade' => $request->input('is_trade') ?? null,
                'post_trade_id' => $request->input('post_trade_id'),
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'ram' => $request->input('ram'),
                'storage' => $request->input('storage'),
                'video_url' => $request->input('video_url'),
                'status' => $request->input('status'),
                'price' => $request->input('price'),
                'address' => $request->input('address'),
                'public_status' => $request->input('public_status'),
                'guarantee' => $request->input('guarantee'),
                'sold' => $request->input('sold'),
                'color' => $request->input('color'),
                'cpu' => $request->input('cpu'),
                'gpu' => $request->input('gpu'),
                'storage_type' => $request->input('storage_type'),
                'brand_id' => $request->input('brand_id'),
                'display_size' => $request->input('display_size'),
            ];
            $newPost = $this->postRepo->store($postData);
            DB::commit();
            return $this->sendResponse(config('apps.message.create_post_success'), $newPost);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.create_post_error'), [], config('apps.general.error_code'));
        }
    }

    public function update($user_id, $post_id, $request){
        try {
            DB::beginTransaction();
            $postData = $request->only(['is_trade', 'post_trade_id', 'title', 'category_id', 'name',
                'description', 'ram', 'storage', 'video_url', 'status', 'price', 'address',
                'public_status', 'guarantee', 'sold', 'color', 'cpu', 'gpu', 'storage_type', 
                'brand_id', 'display_size'
            ]);
            $postData['user_id'] = $user_id;
            $updatePost = $this->postRepo->updateByField('id', $post_id, $postData);
            DB::commit();
            return $this->sendResponse(config('apps.message.update_post_success'), $updatePost);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.update_post_error'), [], config('apps.general.error_code'));
        }
    }

    public function delete($id)
    {
        $post = Post::destroy($id);
        return response()->json($id);
    }
}