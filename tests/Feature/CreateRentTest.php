<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;    

class CreateRentTest extends TestCase
{
    public function test_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/rent/60574/tv', $user->toArray());

        $this->assertDatabaseHas('rents', [
            'user_id' => $user->id,
            'media_id' => 60574,
            'media_name' => 'Peaky Blinders',
            'media_img' => 'https://image.tmdb.org/t/p/original/vUUqzWa2LnHIVqkaKVlVGkVcZIW.jpg'
        ]);
    }

    public function test_admin_cant_rent()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/rent/60574/tv', $user->toArray());

        $response->assertStatus(302);
    }
}
