<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'name'=> $this->name,
            'sex'=> $this->sex,
            'avatar_url'=> $this->avatar_url,
            'phone'=> $this->phone,
            'address'=> $this->address,
            'facebook_url'=> $this->facebook_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
