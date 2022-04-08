<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_responsive.css')}}">
</head>

@can('user')
    


<header class="header">



    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{route('home')}}" style="font-size: 25px;">TheCheapest</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{route('all.products')}}"  method="GET" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="search">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc"> 
                                                <li><a class="clc" href="#">All Categories</a></li>
                                                @foreach ($categories as $category )
                                                     <li><a class="clc" href="#">{{$category->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
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

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">Categories</div>
                            </div>

                            <ul class="cat_menu">
                                @foreach ($categories as $category )
                                <li><a href="#">{{$category->category_name}} <i class="fas fa-chevron-right ml-auto"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Menu -->

</header>
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/shop_background.jpg')}}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">All products</h2>
    </div>
</div>

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            @foreach ($categories as $category)
                            <li><a href="#">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range:</p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Subcategories</div>
                        <ul class="brands_list">
                            @foreach ($subcategories as $subcategory)
                            <li class="brand"><a href="#">{{$subcategory->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                
                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text"><i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                        <!-- Product Item -->
                        @foreach ($products as $product)
                        @if ($product->status ==1)
                            
                     
                        <a href="{{url('user/product/view/'.$product->id)}}" style="text-decoration: none;">
                            @if ($product->discount_price !=NULL)
                            <div class="product_item discount">
                             
                            @else
                             <div class="product_item is_new">
                            @endif
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($product->image)}}" alt="" style="width: 100px;"></div>
                            <div class="product_content">
                                <div class="product_price">
                                    @if ($product->discount_price==NULL)
                                       <p style="color: black">  {{number_format($product->price)}} L.L</p>
                                    @else
                                    <p style="color: red">{{number_format($product->discount_price)}} L.L</p> 
                                    @endif
                                    
                                </div>
                                <div class="product_name"><div><a href="{{url('user/product/view/'.$product->id)}}" tabindex="0">{{$product->brand}} {{$product->name}}</a></div></div>
                            </div>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                           
                            <ul class="product_marks">
                                @if ($product->discount_price !=NULL)
                                @php
					$discount_percentage = ($product->price - $product->discount_price)/($product->price)*100;
					@endphp
                                    <li class="product_mark product_discount">-{{intval($discount_percentage)}}%</li>  
                                @elseif ($product->created_at->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))

                                    <li class="product_mark product_new">new</li>
                                @else
                                   
                                @endif

                                
                            </ul>
                        </div></a>
                        @else
                            
                        @endif
                        @endforeach
                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                        <ul class="page_nav d-flex flex-row">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">21</a></li>
                        </ul>
                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endcan
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>

<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('frontend/js/shop_custom.js')}}"></script>

    

    
