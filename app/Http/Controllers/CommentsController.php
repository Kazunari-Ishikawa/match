<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Work;

class CommentsController extends Controller
{
    public function index()
    {
        return view('comments.index');
    }

    // パラメータで指定されたWorkのCommentを取得する
    public function getComments($id)
    {
        $comments = Comment::where('work_id', $id)->with(['work', 'user'])->get();

        return response($comments);
    }

    // コメントを投稿する
    public function create(Request $request, $id)
    {
        // ログインユーザーでない場合ログインページへ
        if (!Auth::check()) {
            return redirect('/login');
        }
        // パラメータが数字でない場合リダイレクト
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message',__('Invalid operation was performed.'));
        }
        $comment = new Comment;
        $comment->work_id = $id;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->save();

        // DBへ保存後、Work詳細表示へリダイレクト
        return redirect()->route('works.show', ['id' => $id]);
    }

    // パラメータで指定されたWorkの最新Commentを取得する
    public function getLatestComment($id)
    {
        $comment = Comment::with(['work','user'])->where('work_id', $id)->latest()->first();

        return response()->json($comment);
    }

    public function destroy($id)
    {
        // 登録者以外が対象のcommentsを編集しようとした場合エラーを返す
        if (!Auth::user()->comments()->find($id)) {
            abort(401);
        }
        $comment = Auth::user()->comments()->find($id)->delete();
        \Log::debug($comment);

        return response(200);
    }
}
