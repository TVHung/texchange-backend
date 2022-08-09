<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use App\Services\BaseService;
use App\Models\Product;
use App\Models\ProductMobile;
use App\Models\ProductLaptop;
use App\Models\ProductPc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Requests\Product\ProductRequest;
class ProductController extends Controller
{
    protected $productService;
    protected $productRepo;
    protected $baseService;
    public function __construct(ProductService $productService, ProductRepository $productRepo, BaseService $baseService){
        $this->productService = $productService;
        $this->productRepo = $productRepo;
        $this->baseService = $baseService;
    }

    public function all()
    {
        if (Auth::check()) {
            if(Auth::user()->is_admin == 1){
                $products = $this->productService->getAllAdmin();
                return (new ProductCollection($products))->response();
            }
            return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        } 
    }
    
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $products = $this->productService->getAll($user_id);
            return (new ProductCollection($products))->response();
        }else{
            $products = $this->productService->getAllWithoutLogin();
            return (new ProductCollection($products))->response();
        }
    }

    public function getRecentlyProducts()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $products = $this->productService->getRecentlyProducts($user_id);
            return (new ProductCollection($products))->response();
        }else{
            $products = $this->productService->getRecentlyProducts();
            return (new ProductCollection($products))->response();
        }
    }

    public function getProductHasTrade()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $products = $this->productService->getProductHasTrade($user_id);
            return (new ProductCollection($products))->response();
        }else{
            $products = $this->productService->getProductHasTrade();
            return (new ProductCollection($products))->response();
        }
    }

    public function getRecommendProducts($id) //id is id of product get recommend
    {
        try {
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $products = $this->productService->getSameDetailProducts($user_id, $id);
                return (new ProductCollection($products))->response();
            }else{
                $products = $this->productService->getSameDetailProducts(null, $id);
                return (new ProductCollection($products))->response();
            }
        } catch (\Throwable $th) {
            return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
        }
    }

    public function getCategoryProducts($id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $products = $this->productService->getProductCategory($user_id, $id);
            return (new ProductCollection($products))->response();
        }else{
            $products = $this->productService->getProductCategory($id);
            return (new ProductCollection($products))->response();
        }
    }

    public function setBlockProduct($id)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == config('constants.is_admin')){
                $result = $this->productService->setBlockProduct($id);
                return $result;
            }
            return $this->baseService->sendError(config('apps.message.not_role_admin'), [], config('apps.general.error_code'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        } 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'name' => 'bail|required|string',
            'status' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'guarantee' => 'bail|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
            'brand_id' => $request->input('category_id') != 3 ? 'bail|required|regex:/^\d+(\.\d{1,2})?$/' : '',
            'fileImages' => $request->input('is_trade') ? 'bail' : 'bail|required',
            "command" => $request->input('command') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail',
            "pin" => $request->input('pin') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail',
            "resolution" => $request->input('resolution') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail',
            "ram" => $request->input('ram') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail',
            "storage" => $request->input('storage') ? 'bail|regex:/^\d+(\.\d{1,2})?$/' : 'bail',
        ],
        [
            //require
            'category_id.required'=> config('apps.validation.feild_require'), 
            'name.required'=> config('apps.validation.feild_require'), 
            'status.required'=> config('apps.validation.feild_require'), 
            'address.required'=> config('apps.validation.feild_require'), 
            'price.required'=> config('apps.validation.feild_require'), 
            'title.required'=> config('apps.validation.feild_require'), 
            'description.required'=> config('apps.validation.feild_require'), 
            'fileImages.required'=> config('apps.validation.image_require'), 
            'brand_id.required'=> config('apps.validation.feild_require'), 
            //string
            'name.string'=> config('apps.validation.feild_is_string'), 
            'address.string'=> config('apps.validation.feild_is_string'), 
            'title.string'=> config('apps.validation.feild_is_string'), 
            'description.string'=> config('apps.validation.feild_is_string'), 
            //number
            'product_id.regex'=> config('apps.validation.feild_is_number'),
            'category_id.regex'=> config('apps.validation.feild_is_number'), 
            'status.regex'=> config('apps.validation.feild_require'), 
            'brand_id.regex'=> config('apps.validation.feild_require'), 
            'guarantee.regex'=> config('apps.validation.feild_is_number'), 
            'price.regex'=> config('apps.validation.feild_is_number'), 
            'command.regex'=> config('apps.validation.feild_is_number'), 
            'pin.regex'=> config('apps.validation.feild_is_number'), 
            'resolution.regex'=> config('apps.validation.feild_is_number'), 
            'ram.regex'=> config('apps.validation.feild_is_number'), 
            'storage.regex'=> config('apps.validation.feild_is_number'), 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $newProduct = $this->productService->create($request, $user_id);
            return $newProduct;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }         
    }

    public function show($id)
    {
        $product = $this->productService->get($id);
        return $product;
    }

    public function getProductEdit($id)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $product = $this->productService->getWithEdit($id, $user_id);
            return $product;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }        
        
    }

    public function getMyProducts(Request $request)
    {
        if(Auth::check()){
            $allParameters = \Request::query();
            $user_id = Auth::user()->id;
            if(array_key_exists('type', $allParameters)){
                $myProducts = $this->productService->getUserProducts($user_id, $allParameters['type']);
            }else{
                $myProducts = $this->productService->getUserProducts($user_id);
            }
            return (new ProductCollection($myProducts))->response();
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }    
    }

    public function getUserProducts($id)
    {
        $userProducts = $this->productService->getUserProfileProducts($id);
        return (new ProductCollection($userProducts))->response();
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->input('fileVideo'));
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string',
            'status' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
            'brand_id' => $request->input('category_id') != 3 ? 'bail|required|regex:/^\d+(\.\d{1,2})?$/' : '',
            'fileImages' => $request->input('is_trade') ? 'bail' : 'bail|required',
        ],
        [
            //require
            'category_id.required'=> config('apps.validation.feild_require'), 
            'name.required'=> config('apps.validation.feild_require'), 
            'status.required'=> config('apps.validation.feild_require'), 
            'address.required'=> config('apps.validation.feild_require'), 
            'price.required'=> config('apps.validation.feild_require'), 
            'title.required'=> config('apps.validation.feild_require'), 
            'description.required'=> config('apps.validation.feild_require'), 
            'fileImages.required'=> config('apps.validation.image_require'), 
            //string
            'name.string'=> config('apps.validation.feild_is_string'), 
            'address.string'=> config('apps.validation.feild_is_string'), 
            'title.string'=> config('apps.validation.feild_is_string'), 
            'description.string'=> config('apps.validation.feild_is_string'), 
            //number
            'product_id.regex'=> config('apps.validation.feild_is_number'),
            'category_id.regex'=> config('apps.validation.feild_is_number'), 
            'status.regex'=> config('apps.validation.feild_require'), 
            'brand_id.regex'=> config('apps.validation.feild_require'), 
            'guarantee.regex'=> config('apps.validation.feild_is_number'), 
            'price.regex'=> config('apps.validation.feild_is_number'), 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $updateProduct = $this->productService->update($user_id, $id, $request);
            return $updateProduct;
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }         
        return $this->baseService->sendError(config('apps.message.update_product_error'), [], config('apps.general.error_code'));
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $is_admin = Auth::user()->is_admin;
            $product_id = $this->productService->delete($id, $user_id, $is_admin);
            return $product_id;
        }else{
            return $this->baseService->sendError(config('apps.message.delete_product_error'), [], config('apps.general.error_code'));
        }
    }

    public function upView($id)
    {
        return $this->productService->upView($id);
    }

    public function filter(Request $request)
    {
       $products = Product::filterProduct($request);
       return (new ProductCollection($products))->response();
    }

    public function getMostView()
    {
        $productMostView = $this->productService->getProductDashbpoard("view");
        return $productMostView;
    }

    public function getRecentlyDashboard()
    {
        $productMostRecently = $this->productService->getProductDashbpoard("recently");
        return $productMostRecently;
    }

    public function getViewStatic() {
        $view = $this->productService->getViewStatic();
        return $view;
    }

    public function getSimilarProduct($id) {

    }

    public function getListCompare(Request $request) {
        $array = explode(",", $request->input('array_id'));
        $listCompare = $this->productService->getListCompare($array);
        return (new ProductCollection($listCompare))->response();
    }

    public function productsFeildSuggest(){
        return $this->productService->getFeildSuggest();
    }

    public function getNameSuggest(){
        return $this->productService->getNameSuggest();
    }

    public function getProductInterest(){
        return $this->productService->getProductInterest();
    }

    public function getProductMatching($id){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            return $this->productService->getSameProduct($id, $user_id);
        }else{
            return $this->baseService->sendError(config('apps.message.delete_product_error'), [], config('apps.general.error_code'));
        }
    }

    public function newProductStatic(){
        $products7 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(6))->get());
        $products6 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(5))->get());
        $products5 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(4))->get());
        $products4 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(3))->get());
        $products3 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(2))->get());
        $products2 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(1))->get());
        $products1 = count(Product::where('created_at','>=', \Carbon\Carbon::today()->subDays(0))->get());
        $arrNumStatic = [$products1, $products2, $products3, $products4, $products5, $products6, $products7];
        $arrNumStaticLast = [];
        for ($i=0; $i < count($arrNumStatic); $i++) { 
            if($i > 0)
                array_push($arrNumStaticLast, $arrNumStatic[$i] - $arrNumStatic[$i - 1]);
            else
                array_push($arrNumStaticLast, $arrNumStatic[$i]);
        }
        return [
            'status' => config('apps.general.success'),
            'message' => 'Thành công',
            'data' => array_reverse($arrNumStaticLast)
        ];
    }
}
