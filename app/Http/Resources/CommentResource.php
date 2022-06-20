<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return
            [
                'id'=>$this->id,
                'author'=>$this->user->name,
                'content'=>$this->content,
                'created_at'=>$this->created_at->format('Y-m-d h:m')
            ];
    }
}
