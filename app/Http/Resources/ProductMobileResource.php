<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductMobileResource extends JsonResource
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
            'product_id'=> $this->product_id,
            'brand_id' => $this->brand_id,
            'brand' => $this->brand['name'],
            'color' => $this->color,
            'pin' => $this->pin,
            'resolution' => $this->resolution,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
