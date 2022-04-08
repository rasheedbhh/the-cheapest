<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getProduct($id){
        $product = Products::with('category','store','subcategory')->where('id',$id)->first();
        $categories = Categories::all();
        $subcategories = Subcategory::with('category')->get();

        return view('user.getProduct',compact('product','categories','subcategories'));
    }

    public function addProduct(Request $request){
        $total_price = $request->quantity*$request->price;
        Orders::create([
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
            'store_id' => $request->store_id,
            'product_id' => $request->product_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'total_price' => $total_price
        ]);
        $notification=array(
            'message'=>'Item successfully added to your wishlist!',
            'alert-type'=>'success'
        );
        return redirect()->route('home')->with($notification);
    }

    public function myWishlist($id){
        $orders = Orders::with('user','product','store')->where('user_id',Auth::user()->id)->get();
        // dd($orders);
        return view('user.myWishlist',compact('orders'));
    }

    public function allProducts(){
        $categories= Categories::all();
        $subcategories = Subcategory::all();

        $search = request()->query('search');
        if($search){
            $products = Products::where('brand','LIKE',"%{$search}%")->with('category','subcategory','store')->get();
         }
         else{
         $products = Products::orderBy('created_at')->with('category','subcategory','store')->get();
        
    }
return view('allProducts',compact('products','categories','subcategories'));
}
}