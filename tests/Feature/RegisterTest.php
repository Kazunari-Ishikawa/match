<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    private $attributes;

    public function setUp() :void
    {
        parent::setUp();
        $this->attributes = [
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ];
    }

    /**
     * User/register
     *
     * @dataProvider trueData
     * @return void
     */
    public function test_ユーザーを登録できる($params)
    {
        $response = $this->get('/register');
        $response->assertViewIs('auth.register');

        $response = $this->post('/register', $params);
        $this->assertDataBaseHas('users', ['email' => $params['email']]);
    }

    /**
     * User/register
     *
     * @dataProvider errorData
     * @return void
     */
    public function test_ユーザーを登録できない($params)
    {
        $response = $this->get('/register');
        $response->assertViewIs('auth.register');

        $response = $this->post('/register', $params);
        $this->assertDataBaseMissing('users', ['email' => $params['email']]);
    }

    /**
     * User/register
     *
     * @return void
     */
    public function test_メールアドレスの重複エラー()
    {
        $response = $this->get('/register');
        $response->assertViewIs('auth.register');

        $user = User::create($this->attributes);
        $response = $this->post('/register', $this->attributes);
        $this->assertDataBaseMissing('users', ['id' => 2]);
    }

    public function trueData()
    {
        return [
            'valid data' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => 'password',
                    'password_confirmation' => 'password'
                ]
            ]
        ];
    }

    public function errorData()
    {
        return [
            'validation: email is not email format' => [
                'requestData' => [
                    'email' => 'test',
                    'password' => 'password',
                    'password_confirmation' => 'password'
                ]
            ],
            'validation: password is null' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => null,
                    'password_confirmation' => 'password'
                ]
            ],
            'validation: password_confirmation is null' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => 'password',
                    'password_confirmation' => null
                ]
            ],
            'validation: password is short' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => 'pass',
                    'password_confirmation' => 'password'
                ]
            ],
            'validation: password is long' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => 'passwordpasswordpassword',
                    'password_confirmation' => 'password'
                ]
            ],
            'validation: password_confirmation is not same' => [
                'requestData' => [
                    'email' => 'testtaro@example.com',
                    'password' => 'password',
                    'password_confirmation' => 'passwordpass'
                ]
            ],
        ];
    }

    // public function test_プロフィールを編集できる()
    // {
    //     $user = User::create($this->attributes);

    //     // 初期値が入力されているか確認
    //     $this->assertSame($user->name, '名無しさん');

    //     // ユーザー名とEmailを変更
    //     $editData = [
    //         'name' => 'テスト太郎',
    //         'email' => 'taro@test.com',
    //     ];
    //     $user->fill($editData)->save();

    //     // 変更後のデータがusersに含まれることを確認
    //     $this->assertDataBaseHas('users', $editData);

    //     // 変更前のデータがusersに含まれていないことを確認
    //     $this->assertDataBaseMissing('users', $this->attributes);
    // }

    // public function test_プロフィールの編集ができない()
    // {
    //     $user = User::create($this->attributes);

    //     // 初期値が入力されているか確認
    //     $this->assertSame($user->name, '名無しさん');

    //     // ユーザー名とEmailを変更
    //     $editData = [
    //         'name' => 'あいうえおアイウエオかきくけこカキクケコさしすせそ',
    //         'email' => 'tarocom',
    //     ];
    //     $user->fill($editData)->save();
    //     \Log::debug($user);
    //     // 変更後のデータがusersに含まれることを確認
    //     // $this->assertDataBaseHas('users', $editData);

    //     // 変更前のデータがusersに含まれていないことを確認
    //     // $this->assertDataBaseMissing('users', $this->attributes);
    // }

}