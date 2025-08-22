<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'cpf' => '123.456.789-01',
            'first_name' => 'João',
            'second_name' => 'Silva',
            'occupation' => 'Developer',
            'password' => 'password123',
            'birth_date' => '1990-01-01',
            'joined_at' => '2024-01-01',
            'color' => 'blue',
            'photo' => 'https://example.com/photo.jpg'
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/users', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'firstName', 'secondName']);
    }

    public function test_show()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson(['id' => $user->id]);
    }

    public function test_update()
    {
        $authUser = User::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($authUser, 'api')
            ->putJson("/api/users/{$user->id}", [
                'first_name' => 'Updated Name'
            ]);

        $response->assertStatus(200)
            ->assertJson(['firstName' => 'Updated Name']);
    }

    public function test_destroy()
    {
        $authUser = User::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($authUser, 'api')
            ->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}