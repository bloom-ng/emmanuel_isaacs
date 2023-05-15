<?php

namespace Tests\Feature\Api;

use App\Models\Log;
use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogTest extends TestCase
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
    public function it_gets_logs_list()
    {
        $logs = Log::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.logs.index'));

        $response->assertOk()->assertSee($logs[0]->action);
    }

    /**
     * @test
     */
    public function it_stores_the_log()
    {
        $data = Log::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.logs.store'), $data);

        $this->assertDatabaseHas('logs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_log()
    {
        $log = Log::factory()->create();

        $data = [
            'action' => $this->faker->text(255),
            'user_id' => $this->faker->randomNumber,
            'description' => $this->faker->text,
            'data' => [],
        ];

        $response = $this->putJson(route('api.logs.update', $log), $data);

        $data['id'] = $log->id;

        $this->assertDatabaseHas('logs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_log()
    {
        $log = Log::factory()->create();

        $response = $this->deleteJson(route('api.logs.destroy', $log));

        $this->assertModelMissing($log);

        $response->assertNoContent();
    }
}
