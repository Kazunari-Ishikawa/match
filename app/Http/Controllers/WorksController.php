<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
{
    public function index()
    {
        return view('works.index');
    }

    public function new()
    {
        return view('works.new');
    }

    public function create(Request $request)
    {
        \Log::debug($request);
        $work = new Work;

        $work->user_id = Auth::id();
        $work->fill($request->all())->save();

        \Log::debug($work);

        return view('works.new');
    }
}
