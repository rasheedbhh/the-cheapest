<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()->role_id == 1){
            return view('admin.index');
        }
        if(Auth::user()->role_id == 2){
            $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
                return view('manager.index',compact('store'));
            }
            
        
        if(Auth::user()->role_id == 3){
        return view('user.index');
     }   

    }
}