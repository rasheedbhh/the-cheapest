<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Stores;
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
            'messege'=>'Successfully created new user!',
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
            'messege'=>'User data updated successfully!',
            'alert-type'=>'info'
        );
         return redirect()->route('all.users')->with($notification);
     }
 
     public function deleteUser($id){
         User::where('id',$id)->delete();
         $notification=array(
             'messege'=>'User deleted successfully!',
             'alert-type'=>'danger'
         );
         return redirect()->route('all.users')->with($notification);
     }

     //Category Queries
    public function addCategory(){
        return view('admin.categories.add');
    }

    public function insertCategory(Request $request){
        Categories::create(
            [
                'category_name' => $request->category_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
       
            $notification=array(
                'messege'=>'Category created successfully!',
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
        Categories::where('id', $id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
        ]);
        $notification=array(
            'messege'=>'Category updated successfully!',
            'alert-type'=>'info'
        );
        return redirect()->route('all.categories')->with($notification);
    }

    public function deleteCategory($id){
        Categories::where('id',$id)->delete();
    }

    //Store Queries

    public function getStores(){
        $stores = Stores::orderBy('created_at','desc')->with('manager')->get();
        return view('admin.store.all',compact('stores'));
    }

    public function addStore(){
        $managers = User::where('role_id',2)->get();
        return view('admin.store.add',compact('managers'));
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
            'messege'=>'Store created successfully!',
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
            'messege'=>'Store updated successfully!',
            'alert-type'=>'info'
        );
        return redirect()->route('all.stores')->with($notification);
    }

    public function deleteStore($id){
        Stores::where('id',$id)->delete();
    }

}
