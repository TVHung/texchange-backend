<?php
namespace App\Services;

use App\Models\Product;
use App\Models\ProductMobile;
use App\Models\ProductLaptop;
use App\Models\ProductPc;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductImageRepository;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon\Carbon;
use App\Services\ProductMobileService;
use App\Services\ProductLaptopService;
use App\Services\ProductPcService;
use App\Services\ProductWishListService;
class ProductService extends BaseService
{
    private $productRepo;
    private $productMobileService;
    private $productLaptopService;
    private $productPcService;
    private $productImageRepo;
    private $productWishListService;
    public function __construct(ProductRepository $productRepo, ProductMobileService $productMobileService, ProductLaptopService $productLaptopService, ProductPcService $productPcService, ProductImageRepository $productImageRepo, ProductWishListService $productWishListService)
    {
        $this->productRepo = $productRepo;
        $this->productMobileService = $productMobileService;
        $this->productLaptopService = $productLaptopService;
        $this->productPcService = $productPcService;
        $this->productImageRepo = $productImageRepo;
        $this->productWishListService = $productWishListService;
    }

    public function getAllAdmin () {
        $allParameters = \Request::query();
        $product = Product::query();

        if (array_key_exists('category_id', $allParameters)) {
            $product->where('category_id', $allParameters['category_id']);
        }
        if (array_key_exists('is_block', $allParameters)) {
            $product->where('is_block', $allParameters['is_block']);
        }
        if (array_key_exists('sold', $allParameters)) {
            $product->where('sold', $allParameters['sold']);
        }

        return $product->orderBy('created_at', 'desc')->paginate(config('constants.paginate'));
    }

    public function getAllBase () {
        return Product::all()
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->take(12);
    }

    public function get($product_id)
    {
        try {
            if (!$this->productRepo->isExists($product_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->productRepo->getById($product_id);
            if($data->is_block === config('constants.is_block'))
                if(Auth::check() && (Auth::user()->is_admin === config('constants.is_admin') || $data->user_id === Auth::user()->id)){
                    return $this->sendResponse(config('apps.message.get_product_success'), new ProductResource($data));
                }else{
                    return $this->sendError(config('apps.message.not_exist'));
                }
            else{
                return $this->sendResponse(config('apps.message.get_product_success'), new ProductResource($data));
            }
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getWithEdit($product_id, $user_id)
    {
        try {
            if (!$this->productRepo->isExists($product_id)) {
                return $this->sendError(config('apps.message.not_exist'));
            }
            $data = $this->productRepo->getById($product_id);
            if($data->user_id == $user_id)
                return $this->sendResponse(config('apps.message.get_product_success'), new ProductResource($data));
            else
                return $this->sendError(config('apps.message.not_complete'));
        } catch (\Exception $e) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    //get all without login
    public function getAllWithoutLogin()
    {
        return $this->getAllBase();
    }
    //get all when logined
    public function getAll($user_id)
    {
        //get all product id of wish list have user_id is current user id
        $productIds = DB::table('product_wish_lists')->select('product_id')->where('user_id', '=', $user_id)->get()->toArray();
        $arr_productId = [];
        foreach ($productIds as $productId) {
            array_push($arr_productId,  $productId->product_id);
        }
        return Product::all()
            ->where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->whereNotIn('id', $arr_productId)
            ->take(12);
    }

    public function getUserProfileProducts($user_id)
    {
        $products = Product::where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->where('is_block', config('constants.is_not_block'))
                    ->paginate(config('constants.paginate_my_product'));
        return $products;
    }

    public function getUserProducts($user_id, $type = 'all')
    {
        switch ($type) {
            case 'all':
                $products = Product::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate_my_product'));
                break;
            case 'sold':
                $products = Product::where('user_id', $user_id)
                            ->where('sold', 1)
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate_my_product'));
                break;
            case 'not_sold':
                $products = Product::where('user_id', $user_id)
                            ->where('sold', 0)
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate_my_product'));
                break;
            case 'private':
                $products = Product::where('user_id', $user_id)
                            ->where('public_status', 0)
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate_my_product'));
                break;
            case 'block':
                $products = Product::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->where('is_block', config('constants.is_block'))
                            ->paginate(config('constants.paginate_my_product'));
                break;
            case 'trade':
                $products = Product::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->where('is_trade', config('constants.is_trade'))
                            ->paginate(config('constants.paginate_my_product'));
                break;
            default:
                $products = Product::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate_my_product'));
                break;
        }
        return $products;
    }

    //get product recently
    public function getRecentlyProducts($user_id = null)
    {
        if($user_id){
            //get all product id of wish list have user_id is current user id
            $productIds = DB::table('product_wish_lists')->select('product_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_productId = [];
            foreach ($productIds as $productId) {
                array_push($arr_productId,  $productId->product_id);
            }
            return Product::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->whereNotIn('id', $arr_productId)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        }else{
            return Product::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        }
    }

    //get product recommend
    public function getSameDetailProducts($user_id = null, $id)
    {
        $product = $this->productRepo->getById($id);
        $price = $product->price;
        $productQuery = Product::query()->where('category_id', '=', $product->category_id)
                                        ->orWhere('name', 'ilike', '%' . $product->name . '%')
                                        ->orWhere('title', 'ilike', '%' . $product->name . '%')
                                        ->orWhere('description', 'ilike', '%' . $product->name . '%')
                                        ->where('is_block', '=', 0)
                                        ->where('sold', '=', 0)
                                        ->where('public_status', '=', 1)
                                        ->whereBetween('price', [$price - 1 * $price, $price + 0.3 * $price])
                                        ->orderBy('price', 'desc')
                                        ->where('id', '!=', $product->id);
        if($product){
            return $productQuery->paginate(12);
        }else{
            return [];
        }
    }

    //get product recently
    public function getProductHasTrade($user_id = null)
    {
        if($user_id){
            $productIds = DB::table('product_wish_lists')->select('product_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_productId = [];
            foreach ($productIds as $productId) {
                array_push($arr_productId,  $productId->product_id);
            }
            return Product::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_trade', 1)
            ->where('is_block', '=', 0)
            ->whereNotIn('id', $arr_productId)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        }else{
            return Product::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_trade', 1)
            ->where('is_block', '=', 0)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        }
    }

    //get product category
    public function getProductCategory($user_id = null, $category_id)
    {
        if(!in_array($category_id, config('constants.category'))){
            return [];
        }
        $products = $this->getAllWithCondition($user_id, null);
        return $products->where('category_id', '=', $category_id);
    }

    //lay danh sach voi truong hop da login va chua login
    public function getAllWithCondition($user_id)
    {
        if($user_id){
            //get all product id of wish list have user_id is current user id
            $productIds = DB::table('product_wish_lists')->select('product_id')->where('user_id', '=', $user_id)->get()->toArray();
            $arr_productId = [];
            foreach ($productIds as $productId) {
                array_push($arr_productId,  $productId->product_id);
            }
            return Product::where('user_id', '!=', $user_id)
            ->where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->whereNotIn('id', $arr_productId)
            ->take(6)
            ->get();
        }else{
            return Product::where('public_status', '=', 1)
            ->where('sold', '=', 0)
            ->where('is_block', '=', 0)
            ->take(6)
            ->get();
        }
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function upView($product_id)
    {
        try {
            DB::beginTransaction();
            $product = $this->find($product_id);
            $view = $product->view + 1;
            $product->view = $view;
            $product->save();
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), []);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->sendError(config('apps.message.error'));
        }
    }

    public function setBlockProduct($product_id)
    {
        $is_exsist = $this->productRepo->isExists($product_id);
        if($is_exsist){
            $product = $this->find($product_id);
            $is_block = $product->is_block == 0 ? 1: 0;
            $product->is_block = $is_block;
            // dd($is_block);
            $product->save();
            return $this->sendResponse(config('apps.message.block_success'), []);
        }else{
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function create($request, $user_id)
    {
        try {
            DB::beginTransaction();
            $productData = [
                'user_id' => $user_id,
                'is_trade' => $request->input('is_trade') ?? 0,
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'ram' => $request->input('ram') ?? 0,
                'storage' => $request->input('storage') ?? 0,
                'video_url' => null,
                'status' => $request->input('status'),
                'price' => $request->input('price') ?? 0,
                'address' => $request->input('address'),
                'public_status' => $request->input('public_status') ?? 1,
                'guarantee' => $request->input('guarantee') ?? 0,
                'sold' => 0,
                'is_block' => config('constants.is_not_block') ?? 0,
                'view' => 0,
                'command' => $request->input('command') ?? null
            ];
            // dd($request->input('fileVideo'));
            
            if($request->file('fileVideo') != null || $request->file('fileVideo') != ""){
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('fileVideo')->getRealPath(), ['folder' => 'product_videos'])->getSecurePath();
                $productData['video_url'] = $uploadedFileUrl;
            }
            $newProduct = $this->productRepo->store($productData);
            // dd($request->input('video_url'));
            $productChilData = [];
            $newProductChild = null;
            switch ($request->input('category_id')) {
                case 1:
                    $productChilData['product_id'] = $newProduct->id;
                    $productChilData['brand_id'] = $request->input('brand_id') ?? null;
                    $productChilData['color'] = $request->input('color') ?? null;
                    $productChilData['pin'] = $request->input('pin') ?? null;
                    $productChilData['resolution'] = $request->input('resolution') ?? null;
                    $newProductChild = $this->productMobileService->create($productChilData);
                    break;
                case 2:
                    $productChilData['product_id'] = $newProduct->id;
                    $productChilData['brand_id'] = $request->input('brand_id') ?? null;
                    $productChilData['color'] = $request->input('color') ?? null;
                    $productChilData['cpu'] = $request->input('cpu') ?? null;
                    $productChilData['gpu'] = $request->input('gpu') ?? null;
                    $productChilData['storage_type'] = $request->input('storage_type') ?? null;
                    $productChilData['display_size'] = $request->input('display_size') ?? null;
                    $productChilData['resolution'] = $request->input('resolution') ?? null;
                    $newProductChild = $this->productLaptopService->create($productChilData);
                    break;
                case 3:
                    $productChilData['product_id'] = $newProduct->id;
                    $productChilData['cpu'] = $request->input('cpu') ?? null;
                    $productChilData['gpu'] = $request->input('gpu') ?? null;
                    $productChilData['storage_type'] = $request->input('storage_type') ?? null;
                    $productChilData['display_size'] = $request->input('display_size') ?? null;
                    $newProductChild = $this->productPcService->create($productChilData);
                    break;
                default:
                    break;
            }

            $files = $request->file('fileImages');
            $num = 0;
            if($request->has('fileImages')){
                foreach($request->file('fileImages') as $image){
                    $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
                    $imageData = [
                        'product_id' => $newProduct->id,
                        'is_banner' => $num == 0 ? 1 : 0,
                        'image_url' => $uploadedFileUrl,
                    ];
                    $newProductImage = $this->productImageRepo->store($imageData);
                    $num = $num + 1;
                }
            }
            if($request->input('is_trade') == 1){
            }
            DB::commit();
            return $this->sendResponse(config('apps.message.create_product_success'), new ProductResource($newProduct));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.create_product_error'), [], config('apps.general.error_code'));
        }
    }

    public function update($user_id, $product_id, $request){
        try {
            DB::beginTransaction();
            $productData = $request->only(['is_trade', 'title', 'name', 'video_url',
                'description', 'ram', 'storage', 'video_url', 'status', 'price', 'address',
                'public_status', 'guarantee', 'sold', 'command'
            ]);
            $productUpdate = $this->productRepo->getById((int)$product_id);
        
            if($productUpdate->is_block === config('constants.is_block')) //user cannot edit product is blocked
                return $this->sendError(config('apps.message.product_is_block_cannot_edit'));
            if($productUpdate->user_id !== $user_id){
                return $this->sendError(config('apps.message.not_role_admin'));
            }
            $productData['user_id'] = $user_id;

            //kiem tra khi edit co xoa anh hay khong
            if($request->input('is_delete_image') != null || $request->input('is_delete_image') != ""){
                $imageIds = explode(",", $request->input('is_delete_image'));
                $deleteImages = $this->productImageRepo->deleteWithListId($imageIds, $product_id);
            }
            //kiem tra khi edit có xoa video hay khong
            if($request->input('is_delete_video') == config('apps.general.is_delete_video'))
                $productData['video_url'] = null;
            
            // dd($request->input('fileVideo'));
            // kiem tra neu co video thi tao moi
            if($request->file('fileVideo') != null || $request->file('fileVideo') != ""){
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('fileVideo')->getRealPath(), ['folder' => 'product_videos'])->getSecurePath();
                $productData['video_url'] = $uploadedFileUrl;
            }

            //kiem tra xem con anh khong
            $countImages = $this->productImageRepo->getNumImageProduct((int)$product_id);
            //kiem tra neu có image
            $files = $request->file('fileImages');
            $num = 0;
            if($request->has('fileImages')){
                foreach($request->file('fileImages') as $image){
                    $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
                    $imageData = [
                        'product_id' => $product_id,
                        'is_banner' => ($countImages == 0 && $num == 0) ? 1 : 0,
                        'image_url' => $uploadedFileUrl,
                    ];
                    $newProductImage = $this->productImageRepo->store($imageData);
                    $num = $num + 1;
                }
            }
            $updateProduct = $this->productRepo->updateById($product_id, $productData);
            // dd($updateProduct);
            //update child
            $productChilData = [];
            $updateProductChild = null;
            switch ($productUpdate->category_id) {
                case 1:
                    $child = $this->productMobileService->getIdByParentId($product_id);
                    $productChilData['brand_id'] = $request->input('brand_id');
                    $productChilData['color'] = $request->input('color');
                    $productChilData['pin'] = $request->input('pin') ?? null;
                    $productChilData['resolution'] = $request->input('resolution') ?? null;
                    $updateProductChild = $this->productMobileService->update($child->id, $productChilData);
                    break;
                case 2:
                    $child = $this->productLaptopService->getIdByParentId($product_id);
                    $productChilData['brand_id'] = $request->input('brand_id');
                    $productChilData['color'] = $request->input('color');
                    $productChilData['cpu'] = $request->input('cpu');
                    $productChilData['gpu'] = $request->input('gpu');
                    $productChilData['storage_type'] = $request->input('storage_type');
                    $productChilData['display_size'] = $request->input('display_size');
                    $productChilData['resolution'] = $request->input('resolution') ?? null;
                    $updateProductChild = $this->productLaptopService->update($child->id, $productChilData);
                    break;
                case 3:
                    $child = $this->productPcService->getIdByParentId($product_id);
                    $productChilData['cpu'] = $request->input('cpu');
                    $productChilData['gpu'] = $request->input('gpu');
                    $productChilData['storage_type'] = $request->input('storage_type');
                    $productChilData['display_size'] = $request->input('display_size');
                    $updateProductChild = $this->productPcService->update($child->id, $productChilData);
                    break;
                default:
                    break;
            }
            // dd($child_id->id);
            if($request->input('is_trade') == 1){ //if have product trade and update
              
            }else{
            }
            DB::commit();
            return $this->sendResponse(config('apps.message.update_product_success'), $updateProduct);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError(config('apps.message.update_product_error'), [], config('apps.general.error_code'));
        }
    }

    public function delete($id, $user_id, $is_admin)
    {
        // dd($is_admin == config('constants.is_admin'));
        if($this->productRepo->isExists($id)){
            $product = Product::find($id); 
            if($user_id == $product->user_id || $is_admin == config('constants.is_admin')){
                $productDelete = Product::destroy($id);
                return $this->sendResponse(config('apps.message.delete_product_success'), $id);
            }
            return $this->sendError(config('apps.message.not_role_admin'));
        }
        return $this->sendError(config('apps.message.not_exist'));
    }

    public function getProductDashbpoard($type){
        try {
            DB::beginTransaction();
            $products = null;
            if($type == "view") //sort for view
                $products = Product::orderBy('view', 'desc')
                                    ->take(5)
                                    ->get();
            else //sort for new
                $products = Product::orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), new ProductCollection($products));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getViewStatic() {
        try {
            DB::beginTransaction();
            $week = DB::table('products')
                        ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(view) as views'))
                        ->groupBy('date')
                        ->take(7)
                        ->get();
            DB::commit();
            return $this->sendResponse(config('apps.message.success'), $week);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getListCompare($array) {
        try {
            DB::beginTransaction();
            $products = Product::whereIn('id', $array)->get();
            DB::commit();
            return $products;
        } catch (\Throwable $th) {
            DB::rollBack();
            return [];
        }
    }

    public function getFeildSuggest() {
        try {
            $data = [];
            $data['name'] = Product::groupBy('name')
                                    ->selectRaw('name, count(name) as count')
                                    ->take(300)
                                    ->orderBy('count', 'desc')
                                    ->pluck('name');

            $color = DB::table("product_laptops")->select("color")->whereNotNull("color");
            $color2 = DB::table("product_mobiles")->select("color")->whereNotNull("color");
            $data['color'] = DB::table("product_mobiles")
                            ->select("color")
                            ->whereNotNull("color")
                            ->union($color)
                            ->orderBy('color', 'asc')
                            ->get()
                            ->take(100)
                            ->pluck('color');

            $display_size = DB::table("product_laptops")->select("display_size")->whereNotNull("display_size");
            $data['display_size'] = DB::table("product_pcs")
                            ->select("display_size")
                            ->whereNotNull("display_size")
                            ->union($display_size)
                            ->orderBy('display_size', 'asc')
                            ->get()
                            ->take(50)
                            ->pluck('display_size');

            $cpu = DB::table("product_laptops")->select("cpu")->whereNotNull("cpu");
            $data['cpu'] = DB::table("product_pcs")
                            ->select("cpu")
                            ->whereNotNull("cpu")
                            ->union($cpu)
                            ->orderBy('cpu', 'asc')
                            ->get()
                            ->take(100)
                            ->pluck('cpu');

            $gpu = DB::table("product_laptops")->select("gpu")->whereNotNull("gpu");
            $data['gpu'] = DB::table("product_pcs")
                            ->select("gpu")
                            ->whereNotNull("gpu")
                            ->union($gpu)
                            ->orderBy('gpu', 'asc')
                            ->get()
                            ->take(100)
                            ->pluck('gpu');
            return $this->sendResponse(config('apps.message.success'), $data);
        } catch (\Throwable $th) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getNameSuggest() {
        try {
            $data = [];
            $data['name'] = Product::groupBy('name')
                                    ->selectRaw('name, count(name) as count')
                                    ->take(100)
                                    ->orderBy('count', 'desc')
                                    ->pluck('name');
            return $this->sendResponse(config('apps.message.success'), $data);
        } catch (\Throwable $th) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getProductInterest(){
        try {
            $data = $this->productWishListService->getMostWishList();  // array id product
            $products = Product::whereIn('id', $data)->get();
            return $this->sendResponse(config('apps.message.success'), new ProductCollection($products));
        } catch (\Throwable $th) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }

    public function getSameProduct($product_id, $user_id){
        try {
            $product = $this->productRepo->getById($product_id);
            $price = (int)$product->price;
            // dd($product->user_id, $user_id);
            $products = Product::where('user_id', '!=', $product->user_id)
                                ->where('id', '!=', $product->id)
                                ->where('category_id', '=', $product->category_id)
                                ->where('is_trade', '!=', $product->is_trade)
                                ->whereBetween('price', [$price - $price * 0.2 , $price + $price * 0.2])
                                // ->where('name', 'ilike', '%'. $product->name .'%')
                                // ->orWhere('title', 'ilike', '%'. $product->name .'%')
                                // ->orWhere('description', 'ilike', '%'. $product->name .'%')
                                ->where('public_status', '=', 1)
                                ->where('sold', '=', 0)
                                ->where('is_block', '=', 0)
                                ->take(4)
                                ->get();
            return $this->sendResponse(config('apps.message.success'), new ProductCollection($products));
        } catch (\Throwable $th) {
            return $this->sendError(config('apps.message.not_complete'));
        }
    }
}