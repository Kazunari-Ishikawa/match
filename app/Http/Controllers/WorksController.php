<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

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
        return response($works);
    }

    public function new()
    {
        return view('works.new');
    }

    public function create(Request $request)
    {
        \Log::debug($request);
        $work = new Work;

        $work->fill($request->all());

        \Log::debug($work);

        return view('works.new');
    }
}
