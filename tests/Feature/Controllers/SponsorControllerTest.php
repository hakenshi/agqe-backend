<?php

namespace Tests\Feature\Controllers;

use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SponsorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        Sponsor::factory()->count(3)->create();

        $response = $this->getJson('/api/sponsors');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Test Sponsor',
            'logo' => 'https://example.com/logo.jpg',
            'website' => 'https://example.com'
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/sponsors', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'name', 'logo']);
    }

    public function test_show()
    {
        $user = User::factory()->create();
        $sponsor = Sponsor::factory()->create();

        $response = $this->actingAs($user, 'api')->getJson("/api/sponsors/{$sponsor->id}");

        $response->assertStatus(200)
            ->assertJson(['id' => $sponsor->id]);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $sponsor = Sponsor::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->putJson("/api/sponsors/{$sponsor->id}", [
                'name' => 'Updated Sponsor'
            ]);

        $response->assertStatus(200)
            ->assertJson(['name' => 'Updated Sponsor']);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        $sponsor = Sponsor::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->deleteJson("/api/sponsors/{$sponsor->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('sponsors', ['id' => $sponsor->id]);
    }
}