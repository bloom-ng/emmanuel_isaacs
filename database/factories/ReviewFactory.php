<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(0, 127),
            'message' => $this->faker->text,
            'visibility' => $this->faker->boolean,
            'product_id' => \App\Models\Product::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
