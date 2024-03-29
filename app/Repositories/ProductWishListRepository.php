<?php

namespace App\Repositories;
use App\Models\ProductWishList;
use App\Models\Product;
use Carbon\Carbon;

/**
 * Class ProductWishListRepository.
 */
class ProductWishListRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(ProductWishList::class);  //đinh nghĩa model product
        $this->fields = $this->getInstance()->getFillable();
    }

    public function updateById($id, array $data)
    {
        return $this->getModel()::where('id', $id)->update($data);
    }

    public function update($id, $data)
    {
        $data = ProductWishList::where('id', $id)->update($data);
        return $data;
    }

    public function create($userInfo)
    {
        try {
            
        } catch (\Exception $e) {
           
        }
    }

    public function isExists($id)
    {
        return $this->getInstance()::where('user_id', $id)->exists();
    }

    //check ton tai cua san pham yeu thich
    public function isExistProduct($user_id, $product_id)
    {
        return $this->getInstance()::where(['user_id'=> $user_id, 'product_id' => $product_id])->exists();
    }

    public function getMostInterest(){
        $mostList = $this->getInstance()::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())
                        ->groupBy('product_id')
                        ->selectRaw('product_id, count(product_id) as count')
                        ->take(12)
                        ->orderBy('count', 'desc')
                        ->pluck('product_id');
        return $mostList;
    }
}
