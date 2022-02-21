<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Services\AddressService;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    protected $addressService;
    public function __construct(AddressService $addressService){
        $this->addressService = $addressService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresss = $this->addressService->getAll();
        return (new AddressCollection($addresss))->response();
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
        $address = new Address();
        $address->city = $request->input('city');
        $address->district = $request->input('district');
        $address->ward = $request->input('ward');
        $address->save();
        return (new AddressResource($address))->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->addressService->get($id);
        return (new AddressResource($address))->response();
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
        $address = $this->addressService->update($id, $input);
        return (new AddressResource($address))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = $this->addressService->delete($id);
    }
}
