<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Content;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContentControllerTest extends TestCase
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
    public function it_displays_index_view_with_contents()
    {
        $contents = Content::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('contents.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.contents.index')
            ->assertViewHas('contents');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_content()
    {
        $response = $this->get(route('contents.create'));

        $response->assertOk()->assertViewIs('app.contents.create');
    }

    /**
     * @test
     */
    public function it_stores_the_content()
    {
        $data = Content::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('contents.store'), $data);

        $this->assertDatabaseHas('contents', $data);

        $content = Content::latest('id')->first();

        $response->assertRedirect(route('contents.edit', $content));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_content()
    {
        $content = Content::factory()->create();

        $response = $this->get(route('contents.show', $content));

        $response
            ->assertOk()
            ->assertViewIs('app.contents.show')
            ->assertViewHas('content');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_content()
    {
        $content = Content::factory()->create();

        $response = $this->get(route('contents.edit', $content));

        $response
            ->assertOk()
            ->assertViewIs('app.contents.edit')
            ->assertViewHas('content');
    }

    /**
     * @test
     */
    public function it_updates_the_content()
    {
        $content = Content::factory()->create();

        $data = [
            'page' => $this->faker->text(255),
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
            'section' => $this->faker->text(255),
            'type' => $this->faker->randomNumber(0),
        ];

        $response = $this->put(route('contents.update', $content), $data);

        $data['id'] = $content->id;

        $this->assertDatabaseHas('contents', $data);

        $response->assertRedirect(route('contents.edit', $content));
    }

    /**
     * @test
     */
    public function it_deletes_the_content()
    {
        $content = Content::factory()->create();

        $response = $this->delete(route('contents.destroy', $content));

        $response->assertRedirect(route('contents.index'));

        $this->assertModelMissing($content);
    }
}
