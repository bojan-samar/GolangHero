<?php

namespace App\Http\Resources\Forum;

use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
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
          'title' => $this->title,
          'slug' => $this->slug,
          'description' => $this->description,
          'description_preview' => $this->description_preview,
          'created_at_human' => $this->created_at_human,
          'user' => $this->user,
          'comments' => $this->comments,
        ];
    }
}
