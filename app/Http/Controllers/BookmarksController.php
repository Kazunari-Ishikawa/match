<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;
use App\Work;
use App\Apply;

class BookmarksController extends Controller
{
  // BookmarkしたWork一覧を取得する
  public function getBookmarksWorks()
  {
    // ユーザーがBookmarkしたWorkのIDを取得する
    $bookmarked_work_id = Bookmark::select('work_id')->where('user_id', Auth::id())->groupBy('work_id')->get();

    // 該当するWorkを取得
    $works = Work::with(['user', 'category'])->where(['is_closed' => false])->whereIn('id', $bookmarked_work_id)->paginate(5);
    return $works;
  }

  public function add($id)
  {
    \Log::debug($id);

    $bookmark = new Bookmark;
    $bookmark->work_id = $id;
    $bookmark->user_id = Auth::id();
    $bookmark->save();

    \Log::debug($bookmark);

    return response($id);
  }

  public function delete($id)
  {
    \Log::debug($id);

    $bookmark = Bookmark::where(['work_id' => $id, 'user_id' => Auth::id()])->delete();

    return $id;
  }
}
