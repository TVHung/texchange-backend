<?php

namespace App\Repositories;

use App\Models\ProductPc;

class ProductPcRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(ProductPc::class);  //đinh nghĩa model ProductPc
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = ProductPc::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return ProductPc::where('id', $id)->exists();
    }
}
