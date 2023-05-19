<?php

namespace App\Http\ApiV1\Modules\Customers\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class CustomerResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'purchased' => $this->purchased,
            'discount' => $this->discount,
        ];
    }
}
