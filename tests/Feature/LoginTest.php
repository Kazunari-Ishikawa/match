<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_ログイン画面表示()
    {
        $response = $this->get('/login')
            ->assertViewIs('auth.login')
            ->assertStatus(200)
            ->assertSee('ログイン');
    }

    /**
     * Auth/login
     *
     * 
     * @return void
     */
    public function test_ログインできる()
    {
        // ユーザーの用意
        $data = [
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ];
        $user = User::create($data);

        $response = $this->post('/login', [
            'email' => $user->email, 'password' => 'password'
        ]);
        $response->assertRedirect('/mypage');
        $this->assertAuthenticatedAs($user);
    }

    public function test_ログアウトできる()
    {
        // ユーザーの用意
        $data = [
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ];
        $user = User::create($data);

        $response = $this->actingAs($user)->post('/logout');
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
