<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

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

        $work->fill($request->all());

        \Log::debug($work);

        return view('works.new');
    }
}
