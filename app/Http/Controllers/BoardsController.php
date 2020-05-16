<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Board;
use App\Message;

class BoardsController extends Controller
{
    // メッセージ一覧画面を表示する
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

    // 受け取った各種IDをもとにBoardを削除する
    public function cancel($work_id, $from_user_id, $to_user_id)
    {
        $board = Board::where(['work_id' => $work_id, 'from_user_id' => $from_user_id, 'to_user_id' => $to_user_id])->first();

        // はじめに関連するMessageを削除する
        Message::where('board_id', $board->id)->delete();
        $board->delete();
    }

    // ログインユーザーのBoardsを取得する
    public function getBoards()
    {
        $user_id = Auth::id();

        // 応募のあった案件に対するBoardsを取得する
        $requested_boards = Board::with(['work:id,title', 'fromUser', 'toUser'])->where('to_user_id', $user_id)->get();

        // それぞれのBoardについて、最新Commentを取得する
        $requested_boards = $requested_boards->map(function($board) {
            $board->message = Message::with('user')->where('board_id', $board->id)->latest()->first();
            return $board;
        });

        // 自身が応募した案件に対するBoardsを取得する
        $applied_boards = Board::with(['work:id,title', 'fromUser', 'toUser'])->where('from_user_id', $user_id)->get();

        // それぞれのBoardについて、最新Commentを取得する
        $applied_boards = $applied_boards->map(function($board) {
            $board->message = Message::with('user')->where('board_id', $board->id)->latest()->first();
            return $board;
        });

        return response(compact('requested_boards', 'applied_boards'));
    }

    // Board詳細画面を表示する
    public function show($id)
    {
        $board = Board::with(['fromUser', 'toUser'])->find($id);

        // ログインしているユーザーIDを取得する
        $request_user_id = (Auth::id() === $board->from_user_id ) ? $board->from_user_id : $board->to_user_id;

        // メッセージのやり取り相手の名前を取得する
        $send_user_name = (Auth::id() === $board->from_user_id) ? $board->toUser->name : $board->fromUser->name;

        return view('messages.show', compact('board', 'request_user_id', 'send_user_name'));
    }

}
