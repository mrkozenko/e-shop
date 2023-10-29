<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check())
        if(Auth::user()->role()->get()[0]->title=='admin')
            return view('admin_panel.index');
        else
            return view('error');
        else
            return view('error');
    }
    public function check_role($name_view)
    {
        if(Auth::check())
            if(Auth::user()->role()->get()[0]->title=='admin')
                return view($name_view);
            else
                return view('error');
        else
            return view('error');
    }
}
