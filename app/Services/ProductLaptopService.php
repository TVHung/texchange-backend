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
}