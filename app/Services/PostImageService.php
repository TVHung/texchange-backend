<?php
namespace App\Services;

use App\Models\PostImage;
use App\Repositories\PostImageRepository;
use Illuminate\Support\Facades\DB;

class PostImageService extends BaseService
{
    private $postImageRepo;
    public function __construct(PostImageRepository $postImageRepo)
    {
        $this->postImageRepo = $postImageRepo;
    }

    public function create ($request){
        try {
            DB::beginTransaction();
            $postImageData = [
                'post_id' => $request->input('post_id'),
                'is_banner' => $request->input('is_banner'),
                'image_url' => $request->input('image_url'),
            ];
            DB::commit();
            $newImage = $this->postImageRepo->store($postImageData);
            return $this->sendResponse("Thành công");
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError("Thất bại");
        }
    }

    public function getAll()
    {
        return $this->postImageRepo->all();
    }

    public function find($id)
    {
        return PostImage::find($id);
    }

    public function update($id, array $post_data){
        $post_image = tap(PostImage::where('id', $id))->update($post_data);
        return response()->json($post_image);
    }

    public function delete($id)
    {
        dd($id);
        $post_image = PostImage::destroy($id);
        return response()->json($id);
    }
}