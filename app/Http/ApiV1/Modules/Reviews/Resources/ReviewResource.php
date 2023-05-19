<?php

namespace App\Http\ApiV1\Modules\Reviews\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class ReviewResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'like' => $this->like,
            'dislike' => $this->dislike,
            'customer_id' => $this->customer_id,
        ];
    }
}
