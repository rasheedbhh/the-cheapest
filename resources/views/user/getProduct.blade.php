@extends('layouts.user_template')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_responsive.css')}}">
<title>The Cheapest | Add to Wishlist</title>
@section('content')
<div class="super_container">
    <header class="header">

        <!-- Top Bar -->
        
        <!-- Header Main -->
        
        <div class="header_main">
        <div class="container">
        <div class="row">
        
        <!-- Logo -->
        <div class="col-lg-2 col-sm-3 col-3 order-1">
        <div class="logo_container">
            <div class="logo"><a href="#" style="font-size: 25px;">TheCheapest</a></div>
        </div>
        </div>
        
        <!-- Search -->
        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
        <div class="header_search">
            <div class="header_search_content">
                <div class="header_search_form_container">
                    <form action="#" class="header_search_form clearfix">
                        <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                        <div class="custom_dropdown">
                            <div class="custom_dropdown_list">
                                <span class="custom_dropdown_placeholder clc">All Categories</span>
                                <i class="fas fa-chevron-down"></i>
                                <ul class="custom_list clc">
                                    @foreach ($categories as $category)
                                    <li><a class="clc" href="#">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        
        <!-- Wishlist -->
        <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
            <div class="cart">
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                    <div class="cart_content">
        
                        <div class="cart_text"><a href="{{url('user/my/wishlist/'.Auth::user()->id)}}">Wishlist</a></div>
                    </div>
                </div>
            </div>
        
            <div class="cart">
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                    <div class="cart_content">
        
                        <div class="cart_text"><a href="{{route('profile.show')}}">Profile</a></div>
                    </div>
                </div>
            </div>
            <!-- Cart -->
            <div class="cart">
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                    <div class="cart_content">
        
                        <div class="cart_text"><a href="{{route('logout')}}">Logout</a></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <!-- Main Navigation -->
        
        <!-- Menu -->

        <div class="page_menu">
        <div class="container">
        <div class="row">
        <div class="col">
        
        <div class="page_menu_content">
            
            <div class="page_menu_search">
                <form action="#">
                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        </header>
        


<div class="single_product">
    <div class="container">
        <div class="row">
            
            <!-- Selected Image -->
            <div class="col-lg-7 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset($product->image)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">

                    <div class="product_category">{{$product->category->category_name}} > {{$product->subcategory->name}} </div>
                    <div class="product_category">Available at: {{$product->store->name}} </div>
                    <div class="product_name">{{$product->brand}} {{$product->name}}</div>
                    <div class="product_text"><p>{!!$product->description!!}</p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="{{route('add.to.wishlist')}}" method="POST">
                            @csrf
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1" name="quantity">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                            

                            </div>
                            @if ($product->discount_price == NULL)
                                  <div class="product_price">{{number_format($product->price)}} L.L</div>
                                  <input type="hidden" name="price" value="{{$product->price}}"> 
                            @else
                            <div class="product_price">{{number_format($product->discount_price)}} L.L</div>
                            <input type="hidden" name="price" value="{{$product->discount_price}}">
                            @endif
                            
                                
                        
                            <div class="button_container">
                                <input type="hidden" name="store_id" value="{{$product->store->id}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" class="button cart_button">Add to wishlist</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </form>
    </div>
</div>
</div>

@endsection