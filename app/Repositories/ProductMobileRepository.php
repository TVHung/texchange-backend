<?php

namespace App\Repositories;

use App\Models\ProductMobile;

class ProductMobileRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(ProductMobile::class);  //đinh nghĩa model ProductMobile
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = ProductMobile::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return ProductMobile::where('id', $id)->exists();
    }
}
