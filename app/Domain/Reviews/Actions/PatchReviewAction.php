<?php

namespace App\Domain\Reviews\Actions;

use App\Domain\Reviews\Models\Review;

class PatchReviewAction
{
    public function execute(int $reviewId, array $fields): Review
    {
        $review = Review::findOrFail($reviewId);
        $review->update($fields);
        $review->save();
        return $review;
    }
}
