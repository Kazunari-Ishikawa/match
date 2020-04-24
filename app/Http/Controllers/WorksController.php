<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateWorkRequest;
use App\Work;
use App\User;

class WorksController extends Controller
{
    // Work一覧画面表示
    public function index()
    {
        $works = Work::all();

        return view('works.index', ['works' => $works]);
    }
    // Work一覧取得API
    public function getworks()
    {
        $works = Work::all();
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
}
