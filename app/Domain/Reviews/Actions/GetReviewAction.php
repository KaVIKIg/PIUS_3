<?php

namespace App\Domain\Reviews\Actions;

use App\Domain\Reviews\Models\Review;

class GetReviewAction
{
    public function execute(int $reviewId): Review
    {
        return Review::findOrFail($reviewId);
    }
}
