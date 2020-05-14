<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $attributes;

    public function setUp() :void
    {
        parent::setUp();

        $this->attributes = [
            'email' => 'test taro',
            'password' => bcrypt('password'),
        ];
    }

    public function test_ユーザーを登録できる()
    {
        User::create($this->attributes);

        $this->assertDataBaseHas('users', $this->attributes);

    }

}