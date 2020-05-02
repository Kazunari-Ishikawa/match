<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateWorkRequest;
use App\Work;
use App\User;
use App\Comment;
use App\Apply;

class WorksController extends Controller
{
    // Work一覧表示
    public function index()
    {
        return view('works.index');
    }
    // Work一覧取得API
    public function getworks()
    {
        $works = Work::with(['user'])->get();

        return response($works);
    }
    // Work新規登録画面表示
    public function new()
    {
        return view('works.new');
    }
    // Work新規登録機能
    public function create(CreateWorkRequest $request)
    {
        $work = new Work;
        $work->user_id = Auth::id();
        $work->fill($request->all())->save();

        return redirect('/mypage');
    }
    // Work編集画面表示
    public function edit($id)
    {
        // パラメータが数字でない場合リダイレクト
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message',__('Invalid operation was performed.'));
        }
        // 登録者以外が対象のworkを編集しようとした場合リダイレクト
        if (!Auth::user()->works()->find($id)) {
            return redirect('/mypage')->with('flash_message',__('This is not yours! DO NOT EDIT!'));
        }
        $work = Auth::user()->works()->find($id);
        \Log::debug($work);

        return view('works.edit', compact('work'));
    }
    // Work編集機能
    public function update(CreateWorkRequest $request, $id)
    {
        $work = Work::find($id);
        $work->fill($request->all())->save();

        return redirect('/mypage');
    }
    // Workの削除
    public function destroy($id)
    {
        // パラメータが数字でない場合リダイレクト
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message',__('Invalid operation was performed.'));
        }
        // 登録者以外が対象のworkを編集しようとした場合リダイレクト
        if (!Auth::user()->works()->find($id)) {
            return redirect('/mypage')->with('flash_message',__('This is not yours! DO NOT EDIT!'));
        }
        $work = Auth::user()->works()->find($id)->delete();

        return redirect('/mypage');
    }
    // Workの完了処理
    public function close($id)
    {
        if (!ctype_digit($id)) {
            return redirect('/mypage');
        }

        if (!Auth::user()->works()->find($id)) {
            return redirect('/mypage');
        }
        $work = Auth::user()->works()->find($id);
        $work->is_closed = true;
        $work->save();

        return redirect('/mypage');
    }
    // 登録した案件一覧日画面表示
    public function showRegisteredWorks()
    {
        return view('works.registeredWorks');
    }
    // ユーザーが登録したWork一覧を取得する
    public function getRegisteredWorks()
    {
        $works = Work::where('user_id', Auth::id())->with(['user'])->get();

        return response($works);
    }
    // ユーザーがコメントしたWork一覧を取得する
    public function getCommentedWorks()
    {
        // ユーザーがコメントしたWorkのIDを取得する
        $commented_work_id = Comment::select('work_id')->where('user_id', Auth::id())->groupBy('work_id')->get();
        // 該当するWorkを取得
        $works = Work::with('user')->find($commented_work_id);

        return response()->json($works);
    }

    // Work詳細表示
    public function show($id)
    {
        $work = Work::with('user')->find($id);

        return view('works.show', ['work' => $work]);
    }

    // Workへの応募処理
    public function apply($id)
    {
        $work = Work::with('user')->find($id);

        // 応募テーブルにレコードを保存
        $apply = new Apply;
        $apply->work_id = $work->id;
        $apply->user_id = Auth::id();
        $apply->save();

        // BoardsControllerを呼び出して、createメソッドを行う
        $board = app()->make('App\Http\Controllers\BoardsController');
        $board->create($id, Auth::id(), $work->user_id);

        // return redirect()->action('BoardsController@create', ['id' => $id]);
        return redirect('/messages');
    }

    public function getApplyCount($id)
    {
        $count = Apply::where('work_id', $id)->count();

        return response($count);
    }
}
