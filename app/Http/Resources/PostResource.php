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
            'post_trade_id'=> $this->post_trade_id,
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
            'color' => $this->color,
            'cpu' => $this->cpu,
            'gpu' => $this->gpu,
            'storage_type' => $this->storage_type,
            'storage_type_value' => config('constants.storage_type')[$this->storage_type] ?? null,
            'brand_id' => $this->brand_id,
            'display_size' => $this->display_size,
            'is_block' => $this->is_block,
            'images' => $this->postImages,
            'postTrade' => $this->postTrade,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
