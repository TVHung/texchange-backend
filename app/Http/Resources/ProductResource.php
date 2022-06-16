<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=> $this->user_id,
            'is_trade'=> $this->is_trade,
            'title'=> $this->title,
            'category_id'=> $this->category->id,
            'category'=> $this->category->name,
            'name'=> $this->name,
            'description'=> $this->description,
            'ram'=> $this->ram,
            'storage'=> $this->storage,
            'status'=> $this->status,
            'status_value' => config('constants.status')[$this->status] ?? null,
            'video_url' => $this->video_url,
            'price'=> $this->price,
            'address'=> $this->address,
            'public_status'=> $this->public_status,
            'guarantee' => $this->guarantee,
            'sold' => $this->sold,
            'is_block' => $this->is_block,
            'view' => $this->view,
            'images' => $this->productImages,
            'productMobile' => $this->productMobile,
            'productLaptop' => $this->productLaptop,
            'productPc' => $this->productPc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
