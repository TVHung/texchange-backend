<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPcResource extends JsonResource
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
            'cpu' => $this->cpu,
            'gpu' => $this->gpu,
            'storage_type' => $this->storage_type,
            'display_size' => $this->display_size,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
