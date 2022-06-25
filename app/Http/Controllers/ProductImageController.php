<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductImageCollection;
use App\Http\Resources\ProductImageResource;
use App\Services\ProductImageService;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductImageRepository;
use App\Http\Requests\Product\ProductImageRequest;

class ProductImageController extends Controller
{
    protected $productImageService;
    protected $productImageRepo;
    public function __construct(ProductImageService $productImageService, ProductImageRepository $productImageRepo){
        $this->productImageService = $productImageService;
        $this->productImageRepo = $productImageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_images = $this->productImageService->getAll();
        return (new ProductImageCollection($product_images))->response();
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
    public function store(ProductImageRequest $request)
    {
        // return back()->with('success', 'File uploaded successfully');
        $result = $this->productImageService->create($request);
        return response()->json($result);
        // return (new ProductImageResource($product_image))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_image = $this->productImageRepo->getById($id);
        return (new ProductImageResource($product_image))->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $product_image = $this->productImageService->update($id, $input);
        return (new ProductImageResource($product_image))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_image = $this->productImageService->delete($id);
    }
}
