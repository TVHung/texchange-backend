<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductWishListService;
use App\Repositories\ProductWishListRepository;
use App\Http\Resources\ProductWishListCollection;
use App\Http\Resources\ProductWishListResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ProductWishList;
use App\Models\Product;
use App\Services\ProductService;
use App\Repositories\ProductRepository;
use App\Services\BaseService;
class ProductWishListController extends Controller
{
    protected $productWishListService;
    protected $productWishListRepo;
    protected $productService;
    protected $productRepo;
    protected $baseService;
    public function __construct(ProductWishListService $productWishListService, ProductWishListRepository $productWishListRepo, ProductService $productService, ProductRepository $productRepo, BaseService $baseService){
        $this->productWishListService = $productWishListService;
        $this->productWishListRepo = $productWishListRepo;
        $this->productService = $productService;
        $this->productRepo = $productRepo;
        $this->baseService = $baseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $wishlist = $this->productWishListService->getAllWishList($user_id);
            return $this->baseService->sendResponse(config('apps.message.success'), $wishlist);
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        //kiem tra su ton tai neu ton tai thi khong tao
        $exist = $this->productWishListRepo->isExistProduct(Auth::user()->id, $request->input('product_id'));
        if($exist) 
            return $this->baseService->sendResponse(config('apps.message.success'));
        else
            try{
                DB::beginTransaction();
                $user_id = Auth::user()->id;
                $productWishList = new ProductWishList();
                $productWishList->user_id = $user_id;
                $productWishList->product_id = $request->input('product_id');
                $productWishList->save();
                DB::commit();
                return $this->baseService->sendResponse(config('apps.message.success'), $productWishList);
            } catch (\Exception $e) {
                DB::rollback();
                return $this->baseService->sendError(config('apps.message.not_complete'), [], config('apps.general.error_code'));
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id) //id la product id
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $id = $this->productWishListService->delete($product_id, $user_id);
            return $this->baseService->sendResponse(config('apps.message.success'));
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'));
        }
    }
}
