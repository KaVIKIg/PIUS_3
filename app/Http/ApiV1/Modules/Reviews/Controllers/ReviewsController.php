<?php

namespace App\Http\ApiV1\Modules\Reviews\Controllers;

use App\Domain\Reviews\Actions\CreateReviewAction;
use App\Domain\Reviews\Actions\DeleteReviewAction;
use App\Domain\Reviews\Actions\GetAllReviewsAction;
use App\Domain\Reviews\Actions\GetReviewAction;
use App\Domain\Reviews\Actions\PatchReviewAction;

use App\Http\ApiV1\Modules\Reviews\Requests\CreateReviewRequest;
use App\Http\ApiV1\Modules\Reviews\Requests\PatchReviewRequest;

use App\Http\ApiV1\Modules\Reviews\Resources\ReviewResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewsController 
{
    public function index(GetAllReviewsAction $action)
    {
        
        $reviews = $action->execute();
        return response()->json(["data" => $reviews]);
    }


    public function create(CreateReviewRequest $request, CreateReviewAction $action )
    {
        return new ReviewResource($action->execute($request->validated()));
    }

    public function get(int $reviewId, GetReviewAction $action)
    {
        try {
            $review = $action->execute($reviewId);
            
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404,"message" => "Review not found"], 404);
        }
        if ($review) {
            return new ReviewResource($review);
        }
        
    }

    public function patch(int $reviewId, PatchReviewAction $action, PatchReviewRequest $request)
    {
        try {
            return new ReviewResource($action->execute($reviewId, $request->validated()));
        } catch (ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Review not found"], 404);
        }
        
    }


    public function delete(int $reviewId, DeleteReviewAction $action)
    {

        try {
            $action->execute($reviewId);
            return new EmptyResource();
        } catch(ModelNotFoundException) {
            return response()->json(["code" => 404, "message" => "Review not found"], 404);
        }
        
    }
}
