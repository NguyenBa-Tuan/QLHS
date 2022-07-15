<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckLoginRequest;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function check(CheckLoginRequest $request)
    {
        # code...
    }
}
