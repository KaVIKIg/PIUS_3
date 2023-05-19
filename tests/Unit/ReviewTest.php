<?php

//namespace App\Domain\Reviews\Models;

use Tests\TestCase;
use App\Domain\Reviews\Models\Review;
use function PHPUnit\Framework\assertEquals;


class ReviewTest extends TestCase
{

    public function testPatchReview()
    {
        $data = [
            "name" => "review review review",
            "description" => "review review review description description description",
            "like" => 17,
            "dislike" => 17,
            "customer_id" => 1,
        ];

        $review = Review::create($data);
        
        $data = [
            "name" => "review review review dfasdf",
            "description" => "review review review description description description",
            "like" => 17,
            "dislike" => 18,
            "customer_id" => 1,
        ];

        $response = $this->json('PATCH', '/api/v1/reviews/' . $review->id, $data);

        $response->assertStatus(200);

        $review->delete($review->id);
    }

    public function testDeleteReview()
    {
        $data = [
            "name" => "review review review",
            "description" => "review review review description description description",
            "like" => 17,
            "dislike" => 17,
            "customer_id" => 1,
        ];

        $review = Review::create($data);

        $response = $this->json('DELETE', '/api/v1/reviews/' . $review->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);

        $review->delete($review->id);
    }

    public function testGetByIdReview()
    {
        $data = [
            "name" => "review review review",
            "description" => "review review review description description description",
            "like" => 17,
            "dislike" => 17,
            "customer_id" => 1,
        ];

        $review = Review::create($data);

        $response = $this->json('GET', '/api/v1/reviews/' . $review->id);

        $response->assertStatus(200);

        $review->delete($review->id);
    }

    public function testGetReview()
    {
        $data = [
            "name" => "review review review",
            "description" => "review review review description description description",
            "like" => 17,
            "dislike" => 17,
            "customer_id" => 1,
        ];

        $review = Review::create($data);

        $response = $this->json('GET', '/api/v1/reviews/');

        $response->assertStatus(200);

        $review->delete($review->id);
    }
}
