<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        
        return view('login');
    }

    public function check(CheckLoginRequest $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if(Auth::attempt(['name' => $name, 'password' => $password])){
            $role = Auth::user()->role;
            if($role == 0) 
            {
                return redirect()->route('users.index');
            }elseif($role == 1)
            {
                return redirect()->route('student.index');
            }
        }
        return back();
    }
}
