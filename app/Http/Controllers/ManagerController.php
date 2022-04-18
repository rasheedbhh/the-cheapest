<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Requests;
use App\Models\Stores;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ManagerController extends Controller
{
    public function index(){ 
        $stores = Stores::with('manager')->get();
        if(Gate::denies('manager')){
            abort(403);
        }
       return view('manager.index',compact('stores'));
    }

    public function insertStore(Request $request){
        $image = $request->profile_picture;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
        }
        Stores::insert([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'manager_id' => Auth::user()->id,
            'address' => $request->address,
            'profile_picture' => $profile_picture,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        User::where('id',Auth::user()->id)->update(['role_id' => 4]);
        $notification=array(
            'message'=>'Successfully sent your request!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editStore(){
        $store = Stores::where('manager_id',Auth::user()->id)->first();
        return view('manager.editStore',compact('store'));
    }

    public function updateStore(Request $request){
        $image = $request->profile_picture;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
        }
        Stores::where('manager_id',Auth::user()->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'profile_picture' => $profile_picture,
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Successfully updated your store!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getProducts(){
        $products = Products::with('store','category','subcategory','manager')->where('manager_id',Auth::user()->id)->get();
        return view('manager.allProducts',compact('products'));
    }

    public function addProduct(){
        $categories = Categories::all();
        $subcategories = Subcategory::all();
        $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
        return view('manager.addProduct',compact('categories','store','subcategories'));
    }


    public function insertProduct(Request $request){
        $profile_picture = '';
        $image = $request->image;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
        }
        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['weight'] = $request->weight;
        $data['quantity'] = $request->quantity;
        $data['brand'] = $request->brand;
        $data['price'] = $request->price ;
        $data['discount_price'] = $request->discount_price;
        $data['manager_id'] = Auth::user()->id;
        $data['category_id'] = $request->category; 
        $data['subcategory_id'] = $request->subcategory;  
        $data['image'] = $profile_picture;
        $data['store_id'] = $request->store_id;
        $data['status'] = 1;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('products')->insert($data);
        $notification=array(
            'message'=>'Successfully added your product!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getSubcategory($category_id){
        //$subcategories = Subcategory::find($category_id);
        $subcategories = DB::table('subcategories')->where('category_id',$category_id)->get();
        return json_decode($subcategories); 
    }

    public function editProduct($id){
        $categories = Categories::all();
        $subcategories = Subcategory::all();
        $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
        $product = Products::with('subcategory','category','manager','store')->where('id',$id)->first();
        return view('manager.editProduct',compact('product','store','subcategories','categories'));
    }

    public function updateProduct($id, Request $request){
        $old_image = $request->old_image;
        $profile_picture = '';
        $image = $request->image;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
            unlink($old_image);
        }
        $data = array();
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['weight'] = $request->weight;
        $data['quantity'] = $request->quantity;
        $data['brand'] = $request->brand;
        $data['price'] = $request->price ;
        $data['discount_price'] = $request->discount_price;
        $data['manager_id'] = Auth::user()->id;
        $data['category_id'] = $request->category; 
        $data['subcategory_id'] = $request->subcategory;  
        $data['image'] = $profile_picture;
        $data['updated_at'] = Carbon::now();
        DB::table('products')->where('id',$id)->update($data);
        $notification=array(
            'message'=>'Product updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function makeInactive($id){
        Products::where('id',$id)->update(['status'=>0]);
        $notification=array(
            'message'=>'Product is now inactive!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function makeActive($id){
        Products::where('id',$id)->update(['status'=>1]);
        $notification=array(
            'message'=>'Product is now active!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteProduct($id){
        Products::where('id',$id)->delete();
        $notification=array(
            'message'=>'Product deleted successfully!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function getOrders(Request $request){
        $store = Stores::with('manager')->where('manager_id',Auth::user()->id)->first();
        $store_id = $store->id;
        $orders = Orders::with('user','product','store')->where('store_id',$store_id)->get();
        return view('manager.myOrders', compact('orders'));
    }

    
}
