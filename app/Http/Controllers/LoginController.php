<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Stores;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()->role_id == 1){
            $stores = Stores::with('manager')->get();
            $products = Products::with('category','subcategory','store')->get();
            $categories = Categories::all();
            $subcategories = Subcategory::all();
            $users = User::all();
            $orders = Orders::all();
            return view('admin.index',compact('stores','products','categories','users','orders','subcategories'));
        }
        if(Auth::user()->role_id == 2){
            $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
            if ($store != NULL) {
                $store_id = $store->id;
                $products = Products::with('category','subcategory','store')->where('store_id',$store_id)->get();
                $orders = Orders::with('product','user','store')->where('store_id',$store_id)->get();  
                $monthly_orders = Orders::with('product','user','store')->where('store_id',$store_id)->whereMonth('created_at',Carbon::now()->month)->get();
                $yearly_orders = Orders::with('product','user','store')->where('store_id',$store_id)->whereYear('created_at',Carbon::now()->year)->get();
                // dd($monthly_orders,$yearly_orders);
          
                return view('manager.index',compact('store','products','orders','monthly_orders','yearly_orders'));
            } else {
                return view('manager.index',compact('store'));
            }
            

            }
            
        
        if(Auth::user()->role_id == 3){
            $stores = Stores::with('manager')->get();
            $products = Products::with('category','subcategory','store')->get();
            $categories = Categories::all();
            $subcategories = Subcategory::with('category')->get();
            
            return view('user.index',compact('stores','products','categories','subcategories'));
     }   
     if (Auth::user()->role_id ==  4) {
        $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
         return view('manager.index',compact('store'));
     }

    }
}