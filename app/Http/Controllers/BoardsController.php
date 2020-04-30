<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Board;

class BoardsController extends Controller
{
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

    public function getBoards()
    {
        $boards = Board::with(['fromUser', 'toUser'])->where('from_user_id', Auth::id())
            ->orWhere('to_user_id', Auth::id())->get();

        return response($boards);
    }
}
