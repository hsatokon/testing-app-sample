<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;


    public function test_user_can_be_created()
    {
        $user = User::factory()->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
    }
    public function test_email_be_unique()
    {
        User::factory()->create([

            'email' => 'duplicate@example.com',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        User::factory()->create([

            'email' => 'duplicate@example.com',
        ]);
    }

}
