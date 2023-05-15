<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OrderItem;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderItemTest extends TestCase
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
    public function it_gets_order_items_list()
    {
        $orderItems = OrderItem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.order-items.index'));

        $response->assertOk()->assertSee($orderItems[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_order_item()
    {
        $data = OrderItem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.order-items.store'), $data);

        $this->assertDatabaseHas('order_items', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $data = [
            'order_id' => $this->faker->randomNumber,
            'product_id' => $this->faker->randomNumber,
            'quantity' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 0, 9999),
        ];

        $response = $this->putJson(
            route('api.order-items.update', $orderItem),
            $data
        );

        $data['id'] = $orderItem->id;

        $this->assertDatabaseHas('order_items', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->deleteJson(
            route('api.order-items.destroy', $orderItem)
        );

        $this->assertModelMissing($orderItem);

        $response->assertNoContent();
    }
}
