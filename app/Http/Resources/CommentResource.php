<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\CommentCollection;
class CommentResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'product_id'=> $this->product_id,
            'content' => $this->content,
            'replies' => new CommentCollection($this->replies),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
