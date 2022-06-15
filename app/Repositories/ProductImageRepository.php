<?php

namespace App\Repositories;

use App\Models\ProductImage;

class ProductImageRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(ProductImage::class);  //đinh nghĩa model User
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = ProductImage::where('id', $id)->update($data);
        return $data;
    }

    public function isExists($id)
    {
        return $this->getInstance()::where('user_id', $id)->exists();
    }
}
