<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Board;

class BoardsController extends Controller
{
    // メッセージボード一覧を取得する
    public function index()
    {
       return view('messages.index');
    }

    // 受け取った各種IDをもとにBoardを作成する
    public function create($work_id, $from_user_id, $to_user_id)
    {
        $board = new Board;
        $board->work_id = $work_id;
        $board->from_user_id = $from_user_id;
        $board->to_user_id = $to_user_id;
        $board->save();
    }

    // ログインユーザーのメッセージボードを取得する
    public function getBoards()
    {
        $boards = Board::with('work:id,title')->where('from_user_id', Auth::id())->orWhere('to_user_id', Auth::id())->get();
        \Log::debug($boards);
        return response($boards);
    }

    // メッセージ詳細ページ表示
    public function show($id)
    {
        $board = Board::find($id);
        $request_user_id = (Auth::id() == $board->from_user_id ) ? $board->from_user_id : $board->to_user_id;

        return view('messages.show', compact('board', 'request_user_id'));
    }
}
