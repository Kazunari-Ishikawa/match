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
    // ユーザーがコメントしたWorkのIDを取得する
    $bookmarked_work_id = Bookmark::select('work_id')->where('user_id', Auth::id())->groupBy('work_id')->get();

    // 該当するWorkを取得
    $works = Work::with(['user', 'category'])->where('is_closed', false)->find($bookmarked_work_id);

    // 各Workに対して応募数を取得する
    $counts = $works->map(function($work) {
      $count = Apply::where('work_id', $work->id)->count();
      return $count;
    });

    // 各Workに対して、ユーザーがbookmarkしているか判定する
    $is_bookmarked = $works->map(function($work){
      return $work->bookmarks->contains(function($bookmark) {
        return $bookmark->user_id === Auth::id();
      });
    });

    return response()->json(compact('works', 'counts', 'is_bookmarked'));
  }

  public function add(Request $request)
  {
    \Log::debug($request);

    $bookmark = new Bookmark;
    $bookmark->work_id = $request->id;
    $bookmark->user_id = Auth::id();
    $bookmark->save();

    \Log::debug($bookmark);

    return response($bookmark);
  }

  public function delete(Request $request)
  {
    \Log::debug($request);

    $bookmark = Bookmark::where(['work_id' => $request->id, 'user_id' => Auth::id()])->delete();

    return response($bookmark);
  }
}
