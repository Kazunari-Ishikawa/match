<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update()
    {
        \Log::debug('OK');
        return view('users.edit');
    }

    public function showWithdrawForm()
    {
        return view('users.withdraw');
    }
}
