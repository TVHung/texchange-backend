<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Brand;
//use Your Model

/**
 * Class BrandRepository.
 */
class BrandRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Brand::class);  //đinh nghĩa model brand
        $this->fields = $this->getInstance()->getFillable();
    }

    public function getByCategory($category_id){
        return Brand::where('category_id', $category_id)->get();
    }

    public function isExists($id)
    {
        return Brand::where('id', $id)->exists();
    }
}
