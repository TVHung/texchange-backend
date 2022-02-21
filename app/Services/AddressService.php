<?php
namespace App\Services;

use App\Models\Address;

class AddressService
{
    public function get($id)
    {
        return Address::find($id);
    }

    public function getAll()
    {
        return Address::all();
    }

    public function find($id)
    {
        return Address::find($id);
    }

    public function update($id, array $address_data){
        $address = tap(Address::where('id', $id))->update($address_data);
        return response()->json($address);
    }

    public function delete($id)
    {
        $address = Address::destroy($id);
        return response()->json($id);
    }
}