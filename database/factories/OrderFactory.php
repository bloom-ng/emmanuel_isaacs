<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_email' => $this->faker->email,
            'contact_phone' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'payment_ref' => $this->faker->text(255),
            'transaction_id' => $this->faker->text(255),
            'address_line_1' => $this->faker->text,
            'address_line_2' => $this->faker->text,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'sub_total' => $this->faker->randomNumber(1),
            'discount' => $this->faker->randomFloat(2, 0, 9999),
            'shipping_total' => $this->faker->randomNumber(1),
            'order_status' => $this->faker->numberBetween(0, 127),
            'payment_status' => $this->faker->numberBetween(0, 127),
            'payment_response' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
