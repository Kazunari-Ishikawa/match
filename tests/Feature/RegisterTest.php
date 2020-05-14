<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_会員登録画面表示()
    {
        $response = $this->get('/register')
            ->assertStatus(200)
            ->assertViewIs('auth.register')
            ->assertSee('会員登録');
    }

    /**
     * User/register
     *
     * @dataProvider trueData
     * @return void
     */
    public function test_会員登録できる($params)
    {
        $response = $this->post('/register', $params);
        $this->assertDataBaseHas('users', ['email' => $params['email']]);
        $response->assertRedirect('/mypage');
    }

    /**
     * User/register
     *
     * @dataProvider errorData
     * @return void
     */
    public function test_会員登録できない($params)
    {
        $response = $this->get('/register')
            ->assertViewIs('auth.register');

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
        // 重複用データの用意
        $data = [
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ];
        $user = User::create($data);
        $response = $this->post('/register', $data);
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