<?php

namespace Tests\Feature\Controllers;

use App\Models\Log;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogControllerTest extends TestCase
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

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_logs()
    {
        $logs = Log::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('logs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.index')
            ->assertViewHas('logs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_log()
    {
        $response = $this->get(route('logs.create'));

        $response->assertOk()->assertViewIs('app.logs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_log()
    {
        $data = Log::factory()
            ->make()
            ->toArray();

        $data['data'] = json_encode($data['data']);

        $response = $this->post(route('logs.store'), $data);

        $data['data'] = $this->castToJson($data['data']);

        $this->assertDatabaseHas('logs', $data);

        $log = Log::latest('id')->first();

        $response->assertRedirect(route('logs.edit', $log));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_log()
    {
        $log = Log::factory()->create();

        $response = $this->get(route('logs.show', $log));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.show')
            ->assertViewHas('log');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_log()
    {
        $log = Log::factory()->create();

        $response = $this->get(route('logs.edit', $log));

        $response
            ->assertOk()
            ->assertViewIs('app.logs.edit')
            ->assertViewHas('log');
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

        $data['data'] = json_encode($data['data']);

        $response = $this->put(route('logs.update', $log), $data);

        $data['id'] = $log->id;

        $data['data'] = $this->castToJson($data['data']);

        $this->assertDatabaseHas('logs', $data);

        $response->assertRedirect(route('logs.edit', $log));
    }

    /**
     * @test
     */
    public function it_deletes_the_log()
    {
        $log = Log::factory()->create();

        $response = $this->delete(route('logs.destroy', $log));

        $response->assertRedirect(route('logs.index'));

        $this->assertModelMissing($log);
    }
}
