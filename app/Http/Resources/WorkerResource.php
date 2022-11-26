<?php

namespace App\Http\Resources;

use App\Http\Resources\Worker\SkillsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'worker_skills' => SkillsResource::collection($this->whenLoaded('workerSkills')),
            'user' => UserResource::make($this->whenLoaded('user')),
        ]);

    }
}
