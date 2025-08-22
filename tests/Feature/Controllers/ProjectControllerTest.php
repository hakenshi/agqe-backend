<?php

namespace Tests\Feature\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();
        Project::factory()->count(3)->create();

        $response = $this->actingAs($user, 'api')->getJson('/api/projects');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Test Project',
            'cover_image' => 'https://example.com/image.jpg',
            'project_type' => 'social',
            'status' => 'active',
            'responsibles' => 'John Doe',
            'location' => 'Test Location',
            'markdown' => 'Test description'
        ];

        $response = $this->actingAs($user, 'api')->postJson('/api/projects', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'name', 'slug']);
    }

    public function test_show()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $response = $this->actingAs($user, 'api')->getJson("/api/projects/{$project->id}");

        $response->assertStatus(200)
            ->assertJson(['id' => $project->id]);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->putJson("/api/projects/{$project->id}", [
                'name' => 'Updated Project'
            ]);

        $response->assertStatus(200)
            ->assertJson(['name' => 'Updated Project']);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->deleteJson("/api/projects/{$project->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}