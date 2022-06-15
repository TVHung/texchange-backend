<?php

namespace App\Repositories;

use App\Models\ProductLaptop;

class ProductLaptopRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(ProductLaptop::class);  //đinh nghĩa model ProductLaptop
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = ProductLaptop::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return ProductLaptop::where('id', $id)->exists();
    }
}
