<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateWorkRequest;
use App\Work;
use App\User;

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
        foreach ($works as $work) {
            $work->user;
        }

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

        return view('works.new');
    }
    // Work編集画面表示
    public function edit($id)
    {
        $work = Work::find($id);

        return view('works.edit', ['work' => $work]);
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
        $work = Auth::user()->works->find($id);
        // $work = Work::find($id);
        \Log::debug($work);

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
        $user_id = Auth::id();
        $works = Work::where('user_id', Auth::id())->get();

        return response($works);
    }
    // Work詳細表示
    public function show($id)
    {
        $work = Work::find($id);
        $work->user;

        return view('works.show', ['work' => $work]);
    }
}
