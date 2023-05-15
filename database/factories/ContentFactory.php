<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'page' => $this->faker->text(255),
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
            'section' => $this->faker->text(255),
            'type' => $this->faker->randomNumber(0),
        ];
    }
}
