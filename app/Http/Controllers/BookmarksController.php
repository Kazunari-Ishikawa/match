<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bookmark;
use App\Work;

class BookmarksController extends Controller
{
  public function add(Request $request)
  {
    \Log::debug($request);

    $bookmark = new Bookmark;
    $bookmark->work_id = $request->id;
    $bookmark->user_id = Auth::id();
    $bookmark->save();

    \Log::debug($bookmark);

    return response($request);
  }
}
