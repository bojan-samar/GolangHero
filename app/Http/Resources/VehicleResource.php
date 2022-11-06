<?php

namespace App\Http\Resources;

use App\Helpers\Helpers;
use App\Models\Vehicle;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $vehicleModel = new Vehicle;


        return [
            'uuid' => $this->uuid,
            'slug' => $this->slug,
            'name' => $this->name,
            'title' => $this->title,
            'meta' => $this->meta,
            'description' => $this->description,
            'price' => $this->price,
            'images' => $this->full_image_urls,
            'capacity' => $this->capacity,
        ];
    }
}
