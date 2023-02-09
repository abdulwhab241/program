<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(isset(Auth::user()->name))
        {
            return view('dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }
}
