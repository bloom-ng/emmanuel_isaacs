<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->randomNumber,
            'quantity' => $this->faker->randomNumber,
            'image' => $this->faker->text,
            'image_2' => $this->faker->text,
            'thumbnail' => $this->faker->text,
            'slug' => $this->faker->slug,
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'length' => $this->faker->randomNumber(1),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'sale_price' => $this->faker->randomNumber(1),
            'sale_start' => $this->faker->date,
            'sale_end' => $this->faker->date,
            'description' => $this->faker->text,
            'short_description' => $this->faker->text,
            'type' => $this->faker->numberBetween(0, 127),
            'shipping_price' => $this->faker->randomNumber(1),
            'download_link' => $this->faker->text,
        ];
    }
}
