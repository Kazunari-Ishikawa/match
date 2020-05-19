<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;

class CommentsController extends Controller
{
    // コメントした案件一覧画面を表示する
    public function index()
    {
        return view('comments.index');
    }

    // パラメータで指定されたWorkのCommentを取得する
    public function getComments($id)
    {
        $comments = Comment::where('work_id', $id)->with(['work', 'user'])->get();

        return $comments;
    }

    // CommentをDBへ登録する
    public function create(Request $request, $id)
    {
        // パラメータが数字でない場合リダイレクト
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message','不正な処理がされました。時間を置いてやり直してください。');
        }

        // 入力のバリデーション
        $request->validate([
            'content' => 'required|max:100'
        ]);

        $comment = new Comment;
        $comment->work_id = $id;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->save();

        // DBへ保存後、Work詳細表示へリダイレクト
        return redirect()->route('works.show', ['id' => $id])->with('flash_message', 'コメントを投稿しました。');
    }

    // パラメータで指定されたWorkの最新Commentを取得する
    public function getLatestComment($id)
    {
        $comment = Comment::with(['work','user'])->where('work_id', $id)->latest()->first();

        return $comment;
    }

    // Commentを削除する
    public function destroy($id)
    {
        // 登録者以外が対象のCommentを編集しようとした場合エラーを返す
        if (!Auth::user()->comments()->find($id)) {
            abort(401);
        }

        $comment = Auth::user()->comments()->find($id)->delete();

        return $id;
    }
}
