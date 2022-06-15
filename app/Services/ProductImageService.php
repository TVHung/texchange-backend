<?php
namespace App\Services;

use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;
use Illuminate\Support\Facades\DB;

class ProductImageService extends BaseService
{
    private $productImageRepo;
    public function __construct(ProductImageRepository $productImageRepo)
    {
        $this->productImageRepo = $productImageRepo;
    }

    public function create ($request){
        try {
            DB::beginTransaction();
            $productImageData = [
                'product_id' => $request->input('product_id'),
                'is_banner' => $request->input('is_banner'),
                'image_url' => $request->input('image_url'),
            ];
            DB::commit();
            $newImage = $this->productImageRepo->store($productImageData);
            return $this->sendResponse("Thành công");
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError("Thất bại");
        }
    }

    public function getAll()
    {
        return $this->productImageRepo->all();
    }

    public function find($id)
    {
        return ProductImage::find($id);
    }

    public function update($id, array $product_data){
        $product_image = tap(ProductImage::where('id', $id))->update($product_data);
        return response()->json($product_image);
    }

    public function delete($id)
    {
        dd($id);
        $product_image = ProductImage::destroy($id);
        return response()->json($id);
    }
}