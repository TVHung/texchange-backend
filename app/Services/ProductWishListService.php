<?php
namespace App\Services;

use App\Models\ProductWishList;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductWishListService extends BaseService
{
    public function get($id)
    {
        return ProductWishList::find($id);
    }

    //get my product
    public function getAllWishList($user_id)
    {
        $arrayObjProductId = ProductWishList::where('user_id', $user_id)->get(['product_id']);
        $array_productId = array();
        foreach ($arrayObjProductId as $key => $value) {
            array_push($array_productId, $value->product_id);
        }
        return Product::join('product_images', 'products.id', '=', 'product_images.product_id')
                    ->whereIn('products.id', $array_productId)
                    ->where('product_images.is_banner', '=', 1)
                    ->paginate(config('constants.paginate_wish_list'), array('products.*', 'product_images.*')); //get product favoriate
    }

    public function find($id)
    {
        return ProductWishList::find($id);
    }

    public function update($id, array $product_data){
        $product = tap(ProductWishList::where('id', $id))->update($product_data);
        return response()->json($product);
    }

    public function delete($product_id, $user_id)
    {
        $product = ProductWishList::where(['product_id' => $product_id, 'user_id' => $user_id])->pluck('id')->toArray();
        $product_delete = ProductWishList::destroy($product[0]);
        return $product;
    }
}