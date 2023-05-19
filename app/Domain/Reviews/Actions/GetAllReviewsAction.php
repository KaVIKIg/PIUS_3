<?php

namespace App\Domain\Reviews\Actions;

use App\Domain\Reviews\Models\Review;

class GetAllReviewsAction
{
    public function execute(): array
    {
        return Review::all()->toArray();
    }
}
