<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    // プロフィール編集画面表示
    public function edit()
    {
        return view('users.edit');
    }
    // プロフィールを変更する
    public function update()
    {
        \Log::debug('OK');
        return view('users.edit');
    }
    // 退会画面表示
    public function showWithdrawForm()
    {
        return view('users.withdraw');
    }
    // 退会する
    public function withdraw()
    {
        $user_id = Auth::id();
        $works = User::find($user_id)->works;
        foreach ($works as $work) {
            $work->delete();
        }
        \Log::debug($works);
        User::find($user_id)->delete();
        Auth::logout();
        return redirect('/');
    }
}
