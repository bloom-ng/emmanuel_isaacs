<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductReviewsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_product_reviews()
    {
        $product = Product::factory()->create();
        $reviews = Review::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(
            route('api.products.reviews.index', $product)
        );

        $response->assertOk()->assertSee($reviews[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_product_reviews()
    {
        $product = Product::factory()->create();
        $data = Review::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.reviews.store', $product),
            $data
        );

        $this->assertDatabaseHas('reviews', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $review = Review::latest('id')->first();

        $this->assertEquals($product->id, $review->product_id);
    }
}
