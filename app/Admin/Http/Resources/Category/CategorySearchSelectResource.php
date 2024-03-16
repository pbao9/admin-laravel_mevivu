<?php

namespace App\Admin\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategorySearchSelectResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->name
        ];
    }
}
