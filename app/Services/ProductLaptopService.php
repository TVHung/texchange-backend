<?php
namespace App\Services;

use App\Models\ProductLaptop;
use App\Repositories\ProductLaptopRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductLaptopCollection;
use App\Http\Resources\ProductLaptopResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductLaptopService extends BaseService
{
    private $productLaptopRepo;
    public function __construct(ProductLaptopRepository $productLaptopRepo)
    {
        $this->productLaptopRepo = $productLaptopRepo;
    }

    public function create($data) {
        return $this->productLaptopRepo->store($data);
    }

    public function update($product_child_id, $productData) {
        return $this->productLaptopRepo->updateById($product_child_id, $productData);
    }

    public function getIdByParentId($product_id) {
        return $this->productLaptopRepo->findByField('product_id', $product_id);
    }
}