<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'post_trade_id'=> $this->post_trade_id,
            'title'=> $this->title,
            'category_id'=> $this->category->id,
            'category'=> $this->category->name,
            'name'=> $this->name,
            'description'=> $this->description,
            'ram'=> $this->ram,
            'storage'=> $this->storage,
            'status'=> $this->status,
            'price'=> $this->price,
            'address'=> $this->address,
            'public_status'=> $this->public_status,
            'guarantee' => $this->guarantee,
            'sold' => $this->sold,
            'images' => $this->postImages,
            'postMobiles' => $this->postMobiles,
            'postLaptops' => $this->postLaptops,
            'postPcs' => $this->postPcs,
            'postTrade' => $this->postTrade,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
