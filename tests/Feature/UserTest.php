<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_ユーザー登録()
    {
        $user = factory(User::class)->create();

        $readUser = User::where('name',  $user->name)->first();
        $this->assertNotNull($readUser);
        $this->assertTrue(\Hash::check('password', $readUser->password));

    }

}