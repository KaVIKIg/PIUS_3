<?php

namespace App\Domain\Reviews\Actions;

use App\Domain\Reviews\Models\Review;

class CreateReviewAction
{
    public function execute(array $fields): Review
    {
        return Review::create($fields);
    }
}
