<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'author'=>$this->user->name,
            'link'=>route('showPost',$this->id),
            'upvote'=> $this->upvote(),
            'comments'=> CommentResource::collection($this->comments),
            'created_at' => $this->created_at->format('Y-m-d h:m'),
        ];
    }
}
