<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;    

class AdminPageTest extends TestCase
{
    public function test_success()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/admin', $user->toArray());

        $response->assertStatus(200);
    }

    public function test_customer_cant_access_admin_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin', $user->toArray());

        $response->assertStatus(302);
    }
}
