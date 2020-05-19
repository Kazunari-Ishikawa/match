<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;

class BookmarksController extends Controller
{
  // BookmarkテーブルへWorkを追加する
  public function add($id)
  {
    $bookmark = new Bookmark;
    $bookmark->work_id = $id;
    $bookmark->user_id = Auth::id();
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
