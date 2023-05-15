<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OrderItem;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderItemControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_order_items()
    {
        $orderItems = OrderItem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('order-items.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.order_items.index')
            ->assertViewHas('orderItems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_order_item()
    {
        $response = $this->get(route('order-items.create'));

        $response->assertOk()->assertViewIs('app.order_items.create');
    }

    /**
     * @test
     */
    public function it_stores_the_order_item()
    {
        $data = OrderItem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('order-items.store'), $data);

        $this->assertDatabaseHas('order_items', $data);

        $orderItem = OrderItem::latest('id')->first();

        $response->assertRedirect(route('order-items.edit', $orderItem));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->get(route('order-items.show', $orderItem));

        $response
            ->assertOk()
            ->assertViewIs('app.order_items.show')
            ->assertViewHas('orderItem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->get(route('order-items.edit', $orderItem));

        $response
            ->assertOk()
            ->assertViewIs('app.order_items.edit')
            ->assertViewHas('orderItem');
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

        $response = $this->put(route('order-items.update', $orderItem), $data);

        $data['id'] = $orderItem->id;

        $this->assertDatabaseHas('order_items', $data);

        $response->assertRedirect(route('order-items.edit', $orderItem));
    }

    /**
     * @test
     */
    public function it_deletes_the_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->delete(route('order-items.destroy', $orderItem));

        $response->assertRedirect(route('order-items.index'));

        $this->assertModelMissing($orderItem);
    }
}
