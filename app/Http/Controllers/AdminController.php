<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('layouts.myAdmin');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
