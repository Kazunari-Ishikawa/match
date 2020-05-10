<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    // パラメータで指定されたBoardのMessagesを取得する
    public function getMessages($id)
    {
        $messages = Message::where('board_id', $id)->with(['user', 'board'])->get();

        return response($messages);
    }

    // パラメータで指定されたBoardの最新Messageを取得する
    public function getLatestMessage($id)
    {
        $message = Message::with('user')->where('board_id', $id)->latest()->first();
        \Log::debug($message);

        return response($message);
    }

    // MessageをDBに保存する
    public function sendMessage(Request $request)
    {
        \Log::debug($request);
        $message = new Message;
        $message->fill($request->all())->save();

        return response($message);
    }

    public function deleteMessage($id)
    {
        \Log::debug($id);
        $message = Message::find($id)->delete();

        return $id;
    }
}
