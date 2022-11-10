<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;    

class CreateUserTest extends TestCase
{
    public function test_success()
    {
        $user = User::factory()->form()->make(); 

        $user->makeVisible(['password']);

        $response = $this->post('/register', $user->toArray());

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'role' => $user->role,
            'email' => $user->email
        ]);
    }
}
