<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    // パラメータで指定されたWorkに対するCommentを取得する
    public function getComments($id)
    {
        $comments = Comment::where('work_id', $id)->with(['user'])->get();

        return response($comments);
    }

    // コメントを投稿する
    public function create($id)
    {
        \Log::debug($id);
        return redirect('/mypage');
    }
}
