<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
        $parent = parent::toArray($request);
        $data['categories'] = $this->categories;
        $data = array_merge($parent, $data);
        return [
            'status' => 'success',
            'message' => 'book data',
            'data' => $data
        ];
    }
}
