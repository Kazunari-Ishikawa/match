<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Work;
use App\Http\Requests\CreateWorkRequest;

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

    public function create(CreateWorkRequest $request)
    {
        $work = new Work;

        $work->user_id = Auth::id();
        $work->fill($request->all())->save();

        return view('works.new');
    }
}
