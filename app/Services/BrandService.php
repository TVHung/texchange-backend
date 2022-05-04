<?php
namespace App\Services;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Support\Facades\DB;
use App\Services\BaseService;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
class BrandService extends BaseService
{
    private $brandRepo;
    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    public function get($id)
    {
        return Brand::find($id);
    }

    public function getBrandCategory($category_id)
    {
        try {
            $brands = $this->brandRepo->getByCategory($category_id);
            return $this->sendResponse(config('apps.message.success'), $brands);
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getAll()
    {
      
    }
    
    public function create ($request, $user_id){
        try {
            DB::beginTransaction();
            $brandData = [
                'category_id' => $user_id,
                'name' => $request->input('name'),
            ];
            $newBrand = $this->brandRepo->store($brandData);
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), $newProfile);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.error'));
        }
    }

    public function find($id)
    {
        return Brand::find($id);
    }

    public function update($id, array $brand_data){
        $brand = tap(Brand::where('id', $id))->update($brand_data);
        return response()->json($brand);
    }

    public function delete($id)
    {
        $brand = Brand::destroy($id);
        return response()->json($id);
    }
}