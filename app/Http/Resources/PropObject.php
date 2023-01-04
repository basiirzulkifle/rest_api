<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropObject extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request); original
        return [
            'id' => $this->propobject_id,
            'object_id' => $this->object_id,
            'object_name' => $this->object_name,
            'object_value' => $this->object_value,
            'object_location' => $this->object_location,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}

