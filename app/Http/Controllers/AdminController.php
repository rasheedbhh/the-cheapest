<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Stores;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class AdminController extends Controller
{

    public function index(){
        if(Gate::denies('admin')){
            abort(403);
        }
        return view('admin.index');
    }

    //User Queries
    public function addUser(){
        return view('admin.users.add');
    }

    public function insertUser(Request $request){
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        $notification=array(
            'message'=>'Successfully created new user!',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function getUsers(){
        $users = User::orderBy('created_at','desc')->get();
        return view('admin.users.all', compact('users'));
    }

    public function editUser($id){
        $user = User::where('id',$id)->first();
        return view('admin.users.edit', compact('user'));
     }
 
     public function updateUser(Request $request, $id){
         User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()
         ]);
         $notification=array(
            'message'=>'User data updated successfully!',
            'alert-type'=>'info'
        );
         return redirect()->route('all.users')->with($notification);
     }
 
     public function deleteUser($id){
         User::where('id',$id)->delete();
         $notification=array(
             'message'=>'User deleted successfully!',
             'alert-type'=>'danger'
         );
         return redirect()->route('all.users')->with($notification);
     }

     //Category Queries
    public function addCategory(){
        return view('admin.categories.add');
    }

    public function insertCategory(Request $request){
        $image = $request->image;

        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('images/categories/'.$image_name);
            $category_image = 'images/categories/'.$image_name;
        }
    
        Categories::create(
            [
                'category_name' => $request->category_name,
                'popular' => 0,
                'image' => $category_image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
       
            $notification=array(
                'message'=>'Category created successfully!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
    }

    public function getCategories(){
        $categories =  Categories::all();
        return view('admin.categories.all',compact('categories'));
    }

    public function editCategory($id){
        $category =  Categories::where('id',$id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $image = $request->image;

        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('images/categories/'.$image_name);
            $category_image = 'images/categories/'.$image_name;
        }
        Categories::where('id', $id)->update([
            'category_name' => $request->category_name,
            'image' => $category_image,
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Category updated successfully!',
            'alert-type'=>'info'
        );
        return redirect()->route('all.categories')->with($notification);
    }

    public function deleteCategory($id){
        Categories::where('id',$id)->delete();
    }

    public function makePopular($id){
        Categories::where('id',$id)->update(['popular'=>1]);
        $notification=array(
            'message'=>'Category is now popular!',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);
    }

    public function makeNotPopular($id){
        Categories::where('id',$id)->update(['popular'=>0]);
        $notification=array(
            'message'=>'Category is not popular!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    //subcategory queries 
    public function getSubcategories(){
        $subcategories =  Subcategory::with('category')->get();
        return view('admin.subcategories.all',compact('subcategories'));
    }

    public function addSubcategory(){
        $categories = Categories::all();
        return view('admin.subcategories.add',compact('categories'));
    }

    public function insertSubcategory(Request $request){
        Subcategory::create(
            [
                'name' => $request->subcategory_name,
                'category_id' => $request->category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
       
            $notification=array(
                'message'=>'Subcategory created successfully!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
    }


    public function editSubcategory($id){
        $subcategory =  Subcategory::where('id',$id)->first();
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    public function updateSubcategory(Request $request, $id){
        Subcategory::where('id', $id)->update([
            'subcategory_name' => $request->subcategory_name,
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Subcategory updated successfully!',
            'alert-type'=>'info'
        );
        return redirect()->route('all.subcategories')->with($notification);
    }

    public function deleteSubcategory($id){
        Subcategory::where('id',$id)->delete();
    }



    //Store Queries

    public function getStores(){
        $stores = Stores::where('status',2)->orderBy('created_at','desc')->with('manager')->get();
        return view('admin.store.all',compact('stores'));
    }

    public function addStore(){
        $managers = User::where('role_id',2)->get();
        return view('admin.store.add',compact('managers'));
    }

    public function storeRequests(){
        $stores = Stores::where('status',1)->with('manager')->get();
        return view('admin.store.requests',compact('stores'));
    }

    public function acceptRequest($id){
       Stores::where('id',$id)->with('manager')->update(['status'=>2]);
       $store =  Stores::where('id',$id)->with('manager')->first();
        User::where('id',$store->manager->id)->update(['role_id'=>2]);
        $notification=array(
            'message'=>'Request accepted successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function declineRequest($id){
        Stores::where('id',$id)->with('manager')->update(['status'=>0]);
        $notification=array(
            'message'=>'Request declined!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function insertStore(Request $request){
        $image = $request->profile_picture;

        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
        }
        Stores::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'manager_id' => $request->manager_id,
            'address' => $request->address,
            'profile_picture' => $profile_picture,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Store created successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editStore($id){
        $store = Stores::where('id',$id)->with('manager')->first();
        $managers = User::where('role_id',2)->get();
        return view('admin.store.edit',compact('store','managers'));
    }

    public function updateStore(Request $request, $id){
        $profile_picture= '';
        $image = $request->profile_picture;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('images/stores/'.$image_name);
            $profile_picture = 'images/stores/'.$image_name;
        }
        Stores::where('id',$id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'manager_id' => $request->manager_id,
            'address' => $request->address,
            'profile_picture' => $profile_picture,
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Store updated successfully!',
            'alert-type'=>'info'
        );
        return redirect()->route('all.stores')->with($notification);
    }

    public function deleteStore($id){
        Stores::where('id',$id)->delete();
        $notification=array(
            'message'=>'Store deleted successfully!',
            'alert-type'=>'error'
        );
        return redirect()->route('all.stores')->with($notification);
    }

    //Products 
    public function getProducts(){
        $products = Products::with('category','store','subcategory')->get();
        return view('admin.products.index',compact('products'));
    }

    public function getProduct($id){
        $product = Products::with('category','store','subcategory')->where('id',$id)->first();
        return view('admin.products.productAttributes',compact('product'));
    }

    public function offSale($id){
        Products::where('id',$id)->update(['on_sale'=>0]);
        $notification=array(
            'message'=>'Product is not on sale!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function onSale($id){
        Products::where('id',$id)->update(['on_sale'=>1]);
        $notification=array(
            'message'=>'Product is now on sale!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function makeTrending($id){
        Products::where('id',$id)->update(['trending'=>1]);
        $notification=array(
            'message'=>'Product is now trending!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function offTrending($id){
        Products::where('id',$id)->update(['trending'=>0]);
        $notification=array(
            'message'=>'Product is not trending!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function best_seller_on($id){
        Products::where('id',$id)->update(['best_seller'=>1]);
        $notification=array(
            'message'=>'Product is now a best seller!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function best_seller_off($id){
        Products::where('id',$id)->update(['best_sellerr'=>0]);
        $notification=array(
            'message'=>'Product is not a best seller',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function midSliderInactive($id){
        Products::where('id',$id)->update(['mid_slider'=>0]);
        $notification=array(
            'message'=>'Product is not diplayed on the main slider',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function midSliderActive($id){
        Products::where('id',$id)->update(['mid_slider'=>1]);
        $notification=array(
            'message'=>'Product is now diplayed on the main slider',
            'alert-type'=>'error'
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

    public function toggleWeekly($id){
        Products::where('id',$id)->update(['weekly_deals'=>1]);
        $notification=array(
            'message'=>'Product is now on deal of the week!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function offWeekly($id){
        Products::where('id',$id)->update(['weekly_deals'=>0]);
        $notification=array(
            'message'=>'Product is now not on deals of the week!',
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

 

    public function getOrders(){
        $orders = Orders::with('product','user','store')->get();
        return view('admin.orders.index',compact('orders'));
    }

}

