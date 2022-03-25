<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()->role_id == 1){
            return view('admin.index');
        }
        if(Auth::user()->role_id == 2){
            return view('manager.index');
        }
        if(Auth::user()->role_id == 3){
        return redirect()->route('user.index');
     }   
    }
}
