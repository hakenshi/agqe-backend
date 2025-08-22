<?php

namespace Tests\Feature\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        Event::factory()->count(3)->create();

        $response = $this->getJson('/api/events');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Test Event',
            'cover_image' => 'https://example.com/image.jpg',
            'event_type' => 'event',
            'date' => '2024-12-31',
            'starting_time' => '10:00',
            'ending_time' => '18:00',
            'location' => 'Test Location',
            'markdown' => 'Test description'
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/events', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'name', 'slug']);
    }

    public function test_show()
    {
        $event = Event::factory()->create();

        $response = $this->getJson("/api/events/{$event->id}");

        $response->assertStatus(200)
            ->assertJson(['data' => ['id' => $event->id]]);
    }

    public function test_show_by_slug()
    {
        $event = Event::factory()->create(['slug' => 'test-event']);

        $response = $this->getJson('/api/events/slug/test-event');

        $response->assertStatus(200)
            ->assertJson(['data' => ['slug' => 'test-event']]);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->putJson("/api/events/{$event->id}", [
                'name' => 'Updated Event'
            ]);

        $response->assertStatus(200)
            ->assertJson(['name' => 'Updated Event']);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->deleteJson("/api/events/{$event->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}