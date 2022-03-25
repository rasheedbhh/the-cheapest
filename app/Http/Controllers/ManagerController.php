<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){
        if(Gate::denies('manager')){
            abort(403);
        }
        return view('manager.index');
    }

    public function editStore(){

    }

    public function updateStore(){

    }

    public function getProducts(){

    }

    public function addProduct(){

    }


    public function insertProduct(){

    }

    public function editProduct(){

    }

    public function updateProduct(){

    }

    public function deleteProduct(){

    }

    public function getOrders(){

    }

    
}
