<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.pages.admin');
        //return view('dashboard');

    }

    public function logout(Request $request)
{


    //Auth::user();

    //Auth::logout();

    Auth::guard('web')->logout();
    $request->session()->flush();

    $request->session()->regenerate();

    // $request->session()->invalidate();

    // $request->session()->regenerateToken();

    return redirect('/login');
}

public function slider(){
    return view('admin.pages.admin');
}



}
