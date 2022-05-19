<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostTradeResource extends JsonResource
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
            'post_id' => $this->post_id,
            'category_id' => $this->category_id,
            'category'=> $this->category->name,
            'title' => $this->title,
            'name' => $this->name,
            'description' => $this->description,
            'guarantee' => $this->guarantee,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
