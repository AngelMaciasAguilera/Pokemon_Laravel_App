<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('mainpage');
    }
    
    public function login(Request $request)
    {
        $request-> session()->flash('message', 'Login successful');
        $request->session()->put('user',true);
        return back();
    }
    
    public function logout(Request $request)
    {
        $request-> session()->flash('message', 'Logout successful');
        $request->session()->forget('user');
        return back();
    }
}
