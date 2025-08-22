<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;



    public function test_login_success()
    {
        $user = User::factory()->create([
            'cpf' => '123.456.789-00',
            'password' => Hash::make('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'cpf' => '123.456.789-00',
            'password' => 'password123'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
                'user' => ['id', 'firstName', 'secondName']
            ]);
    }

    public function test_login_invalid_credentials()
    {
        $response = $this->postJson('/api/login', [
            'cpf' => '123.456.789-00',
            'password' => 'wrong'
        ]);

        $response->assertStatus(401)
            ->assertJson(['error' => 'Credenciais inválidas']);
    }

    public function test_me_authenticated()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user, 'api')->getJson('/api/me');

        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'firstName', 'secondName']);
    }

    public function test_logout()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user, 'api')->postJson('/api/logout');

        $response->assertStatus(200)
            ->assertJson(['message' => 'Logout realizado com sucesso']);
    }
}