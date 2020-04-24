<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateWorkRequest;
use App\Work;
use App\User;

class WorksController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('works.index', ['works' => $works]);
    }

    public function getworks()
    {
        $works = Work::all();
        foreach ($works as $work) {
            $work->user;
        }
        return response($works);
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
