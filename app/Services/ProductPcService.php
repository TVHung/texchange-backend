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
}