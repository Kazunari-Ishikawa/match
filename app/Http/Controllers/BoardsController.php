<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardsController extends Controller
{
    public function index()
    {
        view('messages.index');
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
}
