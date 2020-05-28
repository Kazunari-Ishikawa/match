<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;
use App\Work;

class BookmarksController extends Controller
{
  // BookmarkテーブルへWorkを追加する
  public function add($id)
  {
    $user_id = Auth::id();
    $work = Work::find($id);

    // 追加しようとしたWorkの依頼者がログインユーザーと同じ場合、エラーを返す
    if($work->user_id === $user_id) {
      abort(403);
    }

    $bookmark = new Bookmark;
    $bookmark->work_id = $id;
    $bookmark->user_id = $user_id;
    $bookmark->save();

    return $id;
  }

  // Bookmarkテーブルから削除する
  public function delete($id)
  {
    $bookmark = Bookmark::where(['work_id' => $id, 'user_id' => Auth::id()])->delete();

    return $id;
  }
}
