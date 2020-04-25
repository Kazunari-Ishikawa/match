<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    // マイページ表示
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', ['user' => $user]);
    }
    // プロフィール編集画面表示
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }
    // プロフィールを変更する
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        // icon以外の入力を代入
        $user->fill($request->except('icon'));
        // リクエストにファイルが存在し、アップロードに成功した場合、ファイル名をモデルへ代入
        if ($request->hasFile('icon')) {
            if ($request->file('icon')->isValid()) {
                $path = $request->icon->store('public/img/icons');
                $user->icon = basename($path);
            }
        }
        $user->save();

        return redirect('/mypage');
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
