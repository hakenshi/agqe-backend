<?php

namespace Tests\Feature\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();
        Donation::factory()->count(3)->create();

        $response = $this->actingAs($user, 'api')->getJson('/api/donations');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'amount' => 100.50,
            'donor_name' => 'John Doe',
            'donor_email' => 'john@example.com',
            'message' => 'Test donation'
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/donations', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'amount', 'donorName']);
    }
}