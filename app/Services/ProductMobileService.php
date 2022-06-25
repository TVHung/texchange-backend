<?php
namespace App\Services;

use App\Models\ProductMobile;
use App\Repositories\ProductMobileRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductMobileCollection;
use App\Http\Resources\ProductMobileResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductMobileService extends BaseService
{
    private $productMobileRepo;
    public function __construct(ProductMobileRepository $productMobileRepo)
    {
        $this->productMobileRepo = $productMobileRepo;
    }

    public function create($data) {
        return $this->productMobileRepo->store($data);
    }

    public function update($product_child_id, $productData) {
        return $this->productMobileRepo->updateById($product_child_id, $productData);
    }

    public function getIdByParentId($product_id) {
        return $this->productMobileRepo->findByField('product_id', $product_id);
    }
}