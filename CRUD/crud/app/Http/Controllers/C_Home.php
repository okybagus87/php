<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Home extends Controller
{
    public function index(){
        return view('frontend.home');
    }
}
