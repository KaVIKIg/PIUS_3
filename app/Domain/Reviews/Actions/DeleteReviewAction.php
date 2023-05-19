<?php

namespace App\Domain\Reviews\Actions;

use App\Domain\Reviews\Models\Review;

class DeleteReviewAction
{
    public function execute(int $reviewId): void
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();
    }
}
