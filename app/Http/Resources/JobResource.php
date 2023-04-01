<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'location' => $this->location,
            'description' => $this->description,
            'stripped_description' => strip_tags($this->description),
            'company' => CompanyResource::make($this->whenLoaded('company')),
            'salary_min' => $this->salary_min,
            'salary_max' => $this->salary_max,
            'created_at_human' => Carbon::parse($this->created_at)->toFormattedDateString(),
            'created_at' => $this->created_at,
            'expired_at' => $this->expired_at,
        ];
    }
}
