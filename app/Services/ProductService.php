<?php
namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductImageRepository;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductService extends BaseService
{
    private $productRepo;
    private $productImageRepo;
    public function __construct(ProductRepository $productRepo, ProductImageRepository $productImageRepo)
    {
        $this->productRepo = $productRepo;
        $this->productImageRepo = $productImageRepo;
    }

    public function getAllAdmin () {
        return Product::paginate(config('constants.paginate'));
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
        // dd($request->input('video_url'));
        try {
            DB::beginTransaction();
            $productData = [
                'user_id' => $user_id,
                'is_trade' => $request->input('is_trade'),
                'title' => $request->input('title'),
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'ram' => $request->input('ram'),
                'storage' => $request->input('storage'),
                'video_url' => null,
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
                'is_block' => config('constants.is_not_block'),
            ];
            switch ($request->input('category_id')) {
                case 1:
                    $productData['cpu'] = null;
                    $productData['gpu'] = null;
                    $productData['storage_type'] = null;
                    $productData['display_size'] = null;
                    break;
                case 3:
                    $productData['brand_id'] = null;
                    $productData['display_size'] = null;
                    $productData['color'] = null;
                    break;
                default:
                    break;
            }
            // dd($request->input('fileVideo'));

            if($request->file('fileVideo') != null || $request->file('fileVideo') != ""){
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('fileVideo')->getRealPath(), ['folder' => 'product_videos'])->getSecurePath();
                $productData['video_url'] = $uploadedFileUrl;
            }
            $newProduct = $this->productRepo->store($productData);

            // if($request->hasFile('fileImages')){
            //     dd($request->file('fileImages'));
            // }
            
            // if($request->file('fileImages') != null || $request->file('fileImage') != ""){
            //     $uploadedFileImageUrl = Cloudinary::upload($request->file('fileImage')->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
            //     $imageData = [
            //         'product_id' => $newProduct->id,
            //         'is_banner' => 1,
            //         'image_url' => $uploadedFileImageUrl,
            //     ];
            //     $newProductImage = $this->productImageRepo->store($imageData);
            // }
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
                'public_status', 'guarantee', 'sold', 'color', 'cpu', 'gpu', 'storage_type', 
                'brand_id', 'display_size'
            ]);
            $productUpdate = $this->productRepo->getById((int)$product_id);
            if($productUpdate->is_block === config('constants.is_block')) //user cannot edit product is blocked
                return $this->sendError(config('apps.message.product_is_block_cannot_edit'));
            if($productUpdate->user_id !== $user_id){
                return $this->sendError(config('apps.message.not_role_admin'));
            }
            $productData['user_id'] = $user_id;
            switch ($productUpdate->category_id) {
                case 1:
                    $productData['cpu'] = null;
                    $productData['gpu'] = null;
                    $productData['storage_type'] = null;
                    $productData['display_size'] = null;
                    break;
                case 3:
                    $productData['brand_id'] = null;
                    $productData['display_size'] = null;
                    $productData['color'] = null;
                    break;
                default:
                    break;
            }

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
            //kiem tra neu có image
            // if($request->file('fileImage') != null || $request->file('fileImage') != ""){
            //     $uploadedFileImageUrl = Cloudinary::upload($request->file('fileImage')->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
            //     $imageData = [
            //         'product_id' => $product_id,
            //         'is_banner' => 1,
            //         'image_url' => $uploadedFileImageUrl,
            //     ];
            //     $newProductImage = $this->productImageRepo->store($imageData);
            // }
            $updateProduct = $this->productRepo->updateByField('id', $product_id, $productData);
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
}