<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contact;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
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
    public function it_gets_contacts_list()
    {
        $contacts = Contact::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contacts.index'));

        $response->assertOk()->assertSee($contacts[0]->first_name);
    }

    /**
     * @test
     */
    public function it_stores_the_contact()
    {
        $data = Contact::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contacts.store'), $data);

        $this->assertDatabaseHas('contacts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_contact()
    {
        $contact = Contact::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->text(255),
            'phone_number' => $this->faker->phoneNumber,
            'message' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.contacts.update', $contact),
            $data
        );

        $data['id'] = $contact->id;

        $this->assertDatabaseHas('contacts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contact()
    {
        $contact = Contact::factory()->create();

        $response = $this->deleteJson(route('api.contacts.destroy', $contact));

        $this->assertModelMissing($contact);

        $response->assertNoContent();
    }
}
