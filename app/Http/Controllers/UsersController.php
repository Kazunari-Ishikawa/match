<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Work;

class UsersController extends Controller
{
    // マイページ画面を表示する
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', compact('user'));
    }

    // ユーザー詳細画面を表示する
    public function show($id)
    {
        // パラメータが数字でない場合リダイレクト
        if (!ctype_digit($id)){
            return redirect('/')->with('flash_message', '不正な処理がされました。時間を置いてやり直してください。');
        }

        $user = User::with('works')->find($id);

        // 存在しないuserのIDの場合リダイレクト
        if (!$user) {
            return redirect('/')->with('flash_message', '不正な処理がされました。時間を置いてやり直してください。');
        }

        return view('users.show', compact('user'));
    }

    // プロフィール編集画面を表示する
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
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

        return redirect('/mypage')->with('flash_message', 'プロフィールを編集しました。');
    }

    // パスワード変更画面を表示する
    public function editPassword()
    {
        return view('users.editPassword');
    }

    // パスワードを変更する
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/mypage')->with('flash_message', 'パスワードを変更しました。');
    }

    // 退会画面を表示する
    public function showWithdrawForm()
    {
        return view('users.withdraw');
    }

    // 退会する
    public function withdraw()
    {
        $user = Auth::user();
        $works = $user->works;

        Auth::logout();

        // 投稿したコメント削除
        $user->comments()->delete();

        // Bookmarksを削除
        $user->bookmarks()->delete();

        // Applyを削除
        $user->applies()->delete();

        // Messageを削除
        $user->messages()->delete();

        // Workと、それに紐づくBoard、Messageを削除
        foreach($works as $work) {
            $boards = $work->boards;
            foreach($boards as $board) {
                $board->messages()->delete();
                $board->delete();
            }
            $work->delete();
        }

        // 応募したBoardと、それに紐づくMessageを削除
        $boards = $user->appliedBoards;
        foreach($boards as $board) {
            $board->messages()->delete();
            $board->delete();
        }

        // Userを削除
        $user->delete();

        return redirect('/');
    }
}
