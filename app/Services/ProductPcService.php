<?php
namespace App\Services;

use App\Models\ProductPc;
use App\Repositories\ProductPcRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductPcCollection;
use App\Http\Resources\ProductPcResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductPcService extends BaseService
{
    private $productPcRepo;
    public function __construct(ProductPcRepository $productPcRepo)
    {
        $this->productPcRepo = $productPcRepo;
    }

    public function create($data) {
        return $this->productPcRepo->store($data);
    }

    public function update($product_child_id, $productData) {
        return $this->productPcRepo->updateById($product_child_id, $productData);
    }

    public function getIdByParentId($product_id) {
        return $this->productPcRepo->findByField('product_id', $product_id);
    }
}