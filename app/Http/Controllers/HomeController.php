<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function homepage(){
        if (Auth::check()){
            return redirect(route('dashboard'));
        }else{
            return view('dashboard');
        }
    }
}
