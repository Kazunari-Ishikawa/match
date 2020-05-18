<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessagesController extends Controller
{
    // パラメータで指定されたBoardのMessagesを取得する
    public function getMessages($id)
    {
        $messages = Message::where('board_id', $id)->with(['user', 'board'])->get();

        return response($messages);
    }

    // MessageをDBに保存する
    public function sendMessage(Request $request)
    {
        \Log::debug($request);
        $message = new Message;
        $message->fill($request->all())->save();

        return response($message);
    }

    // Messageを削除する
    public function deleteMessage($id)
    {
        // 登録者以外が対象のmessageを削除しようとした場合エラーを返す
        if (!Auth::user()->messages()->find($id)) {
            abort(401);
        }
        $message = Auth::user()->messages()->find($id)->delete();

        return $id;
    }
}
