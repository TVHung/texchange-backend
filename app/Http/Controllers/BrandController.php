<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Repositories\BrandRepository;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;
class BrandController extends Controller
{

    protected $brandService;
    protected $brandRepo;
    protected $baseService;
    public function __construct(BrandService $brandService, BrandRepository $brandRepo, BaseService $baseService){
        $this->brandService = $brandService;
        $this->brandRepo = $brandRepo;
        $this->baseService = $baseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getByCategory($category_id)
    {
        $brands = $this->brandService->getBrandCategory($category_id);
        return $brands;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brandService->delete($id);
    }
}
