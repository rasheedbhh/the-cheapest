
@extends('layouts.user_template')


@section('content')

<div class="super_container">

<!-- Header -->

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

<nav class="main_nav">
<div class="container">
<div class="row">
<div class="col">

<div class="main_nav_content d-flex flex-row">

	<!-- Categories Menu -->

	<div class="cat_menu_container">
		<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
			<div class="cat_burger"><span></span><span></span><span></span></div>
			<div class="cat_menu_text">categories</div>
		</div>

		<ul class="cat_menu">
			@foreach ($categories as $category)
			<li><a href="#">{{$category->category_name}} <i class="fas fa-chevron-right ml-auto"></i></a></li>
			@endforeach
		</ul>
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

<!-- Banner -->

<div class="banner" style="height: 70vh;">
<div class="banner_background" style="background-image:url(images/banner_background.jpg) "></div>
<div class="container fill_height">
<div class="row fill_height">
<div class="banner_product_image"><img src="images/banner.png" alt="" style="width:500px;"></div>
<div class="col-lg-5 offset-lg-4 fill_height">
<div class="banner_content">
<h1 class="banner_text" style="font-size: 36px">Your stop to shop</h1>
<div class="button banner_button"><a href="{{route('all.products')}}">Shop Now</a></div>
</div>
</div>
</div>
</div>
</div>

<div class="deals_featured">
<div class="container">
<div class="row">
<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

<!-- Deals -->

<div class="deals">
<div class="deals_title">Deals of the Week</div>
<div class="deals_slider_container">
	
	<!-- Deals Slider -->
	<div class="owl-carousel owl-theme deals_slider">
		
		<!-- Deals Item -->
		@foreach ($products as $product)
			@if ($product->weekly_deals)
				<div class="owl-item deals_item">
			<div class="deals_image"><img src="{{$product->image}}" alt=""></div>
			<div class="deals_content">
				<div class="deals_info_line d-flex flex-row justify-content-start">
					<div class="deals_item_category"><a href="#">{{$product->category->category_name}} > {{$product->subcategory->name}}</a></div>
					
						<div class="deals_item_price_a ml-auto">
					{{number_format($product->price)}} L.L
				</div>
				</div>
				<div class="deals_info_line d-flex flex-row justify-content-start">
					<div class="deals_item_name">{{$product->name}}</div>
					<div class="deals_item_price ml-auto" style="font-size: 16px;">
						
					@if ($product->discount_price == NULL)
						
					@else
						{{number_format($product->discount_price)}} L.L</div>
					@endif
					
				</div>
				<div class="available">
					<div class="available_line d-flex flex-row justify-content-start">
						<div class="available_title">Available: <span>{{$product->quantity}}</span></div>
					</div>
					<div class="available_bar"><span style="width:17%"></span></div>
				</div>
				<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
					<div class="deals_timer_title_container">
						<div class="deals_timer_title">Hurry Up</div>
						<div class="deals_timer_subtitle">Offer ends in:</div>
					</div>
					<div class="deals_timer_content ml-auto">
						<div class="deals_timer_box clearfix" data-target-time="">
							<div class="deals_timer_unit">
								<div id="deals_timer1_hr" class="deals_timer_hr"></div>
								<span>hours</span>
							</div>
							<div class="deals_timer_unit">
								<div id="deals_timer1_min" class="deals_timer_min"></div>
								<span>mins</span>
							</div>
							<div class="deals_timer_unit">
								<div id="deals_timer1_sec" class="deals_timer_sec"></div>
								<span>secs</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			@else
				
			@endif
		@endforeach
		




	</div>

</div>

<div class="deals_slider_nav_container">
	<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
	<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
</div>
</div>

<!-- Featured -->
<div class="featured">
<div class="tabbed_container">
	<div class="tabs">
		<ul class="clearfix">
			<li class="active">Featured</li>
		</ul>
		<div class="tabs_line"><span></span></div>
	</div>

	<!-- Product Panel -->
	<div class="product_panel panel active">
		<div class="featured_slider slider">
			@foreach ($products as $product)
			<div class="featured_slider_item">
				<div class="border_active"></div>
				<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
					<div class="product_image d-flex flex-column align-items-center justify-content-center">
						<img src="{{asset($product->image)}}" alt="" style="width: 150px;"></div>
					<div class="product_content mt-3">
						<div>{{$product->store->name}}</div>
						
						@if ($product->discount_price==NULL)
						<div class="product_price discount">
							<span>{{number_format($product->price)}} L.L</span></div> 
						@else
							<div class="product_price discount">
								{{number_format($product->discount_price)}} L.L
								<span>{{number_format($product->price)}} L.L</span></div>  
						@endif
						<div class="product_name"><div>{{$product->brand}} {{$product->name}}</></div></div>
						<div class="product_extras">
						<button class="product_cart_button"><a style="text-decoration: none; color:white;" href="{{url('user/product/view/'.$product->id)}}">  Add to Cart</a></button>
						</div>
					</div>
					<div class="product_fav"><i class="fas fa-heart"></i></div>
					<ul class="product_marks">
						<li class="product_mark product_discount"></li>
						<li class="product_mark product_new">new</li>
					</ul>
				</div>
			</div>
			@endforeach
			<!-- Slider Item -->

		</div>
		
	</div>
</div>
</div>
</div>
		<div class="featured_slider_dots_cover"></div>
	</div>

</div>
</div>

</div>
</div>
</div>
</div>

<!-- Popular Categories -->

<div class="popular_categories">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="popular_categories_content">
<div class="popular_categories_title">Popular Categories</div>
<div class="popular_categories_slider_nav">
	<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
	<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
</div>
</div>
</div>

<!-- Popular Categories Slider -->

<div class="col-lg-9">
<div class="popular_categories_slider_container">
<div class="owl-carousel owl-theme popular_categories_slider">

	@foreach ($categories as $category)
		@if ($category->popular==1)
		<div class="owl-item">
			<div class="popular_category d-flex flex-column align-items-center justify-content-center">
				@if ($category->image!=NULL)
					<div class="popular_category_image"><img src="{{$category->image}}" alt=""></div>
					<div class="popular_category_text">{{$category->category_name}}</div>
				@else
				<div class="popular_category_image"><img src="" alt="No image found"></div>
				<div class="popular_category_text">{{$category->category_name}}</div>
				@endif
				
			</div>
		</div>
		@else
		@endif
	@endforeach
	<!-- Popular Categories Item -->
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Banner -->

<div class="banner_2">
<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
<div class="banner_2_container">
<div class="banner_2_dots"></div>
<!-- Banner 2 Slider -->

<div class="owl-carousel owl-theme banner_2_slider">

@foreach ($products as $product)
	@if ($product->mid_slider == 1	)
		
	
<!-- Banner 2 Slider Item -->
<div class="owl-item">
<div class="banner_2_item">
<div class="container fill_height">
	<div class="row fill_height">
		<div class="col-lg-4 col-md-6 fill_height">
			<div class="banner_2_content">
				<div class="banner_2_category">{{$product->category->category_name}} > {{$product->subcategory->name}}</div>
				<div class="banner_2_title">{{$product->brand}} {{$product->name}}</div>

				<div class="banner_2_text">
					Available at: {{$product->store->name}}
					{!! $product->description !!}</div>
				<div>
					@if ($product->discount_price == NULL)
						<h1> {{number_format($product->price)}} L.L</h1>
					@else
					<h1 class="text-danger"> {{number_format($product->discount_price)}} L.L</h1>
					@endif
						
				</div>
				<div class="button banner_2_button"><a href="{{route('all.products')}}">Explore</a></div>
			</div>
			
		</div>
		<div class="col-lg-8 col-md-6 fill_height">
			<div class="banner_2_image_container">
				<div class="banner_2_image">
					<img src="{{asset($product->image)}}" alt="" style="width: 300px">
				</div>
			</div>
		</div>
	</div>
</div>			
</div>
</div>
@else
		
@endif
@endforeach
</div>
</div>
</div>

<!-- Hot New Arrivals -->

<div class="new_arrivals">
<div class="container">
<div class="row">
<div class="col">
<div class="tabbed_container">
<div class="tabs clearfix tabs-right">
	<div class="new_arrivals_title">Hot New Arrivals</div>
	<ul class="clearfix">
		<li class="active">Featured</li>
	</ul>
	<div class="tabs_line"><span></span></div>
</div>
<div class="row">
	<div class="col-lg-9" style="z-index:1;">

		<!-- Product Panel -->
		<div class="product_panel panel active">
			<div class="arrivals_slider slider">
				@foreach ($products as $product)
				@if ($product->on_sale == 1)
				<!-- Slider Item -->
				<div class="arrivals_slider_item">
					<div class="border_active"></div>
					<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
						<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($product->image)}}" alt="" style="width: 150px;"></div>
						<div class="product_content">
							@if ($product->discount_price==NULL)
							<div class="product_price discount">
								<span>{{number_format($product->price)}} L.L</span></div> 
							@else
								<div class="product_price discount">
									{{number_format($product->discount_price)}} L.L
									<span>{{number_format($product->price)}} L.L</span></div>  
							@endif
							<div class="product_name"><div><a href="{{url('user/product/view/'.$product->id)}}">{{$product->brand}} {{$product->name}}</a></div></div>
							<div class="product_extras">
								<button class="product_cart_button">Add to Cart</button>
							</div>
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
						</ul>
					</div>
				</div>
				@else
					
				@endif
				
				@endforeach
				

			</div>
			<div class="arrivals_slider_dots_cover"></div>
		</div>

	</div>

	<div class="col-lg-3">
		@foreach ($products as $product)
		@if ($product->id == 3 )
		<div class="arrivals_single clearfix">
			<div class="d-flex flex-column align-items-center justify-content-center">
				<div class="arrivals_single_image"><img src="{{asset($product->image)}}" alt=""></div>
				<div class="arrivals_single_content">
					<div class="arrivals_single_category"><a href="#">{{$product->category->category_name}}</a></div>
					<div class="arrivals_single_name_container clearfix">
						<div class="arrivals_single_name"><a href="#">{{$product->brand}} {{$product->name}} </a></div>
						<div class="arrivals_single_price text-right">	
							@if ($product->discount_price==NULL)
							<div class="product_price discount">
								<span>{{number_format($product->price)}} L.L</span></div> 
							@else
								<div class="product_price discount">
									{{number_format($product->discount_price)}} L.L
									<span>{{number_format($product->price)}} L.L</span></div>  
							@endif</div>
					</div>
					
					<form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
				</div>
				<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
				<ul class="arrivals_single_marks product_marks">
					<li class="arrivals_single_mark product_mark product_new">new</li>
				</ul>
			</div>
		</div>
		@else
			
		@endif
	@endforeach
	</div>

</div>
		
</div>
</div>
</div>
</div>		
</div>

<!-- Best Sellers -->

<div class="best_sellers">
<div class="container">
<div class="row">
<div class="col">
<div class="tabbed_container">
<div class="tabs clearfix tabs-right">
	<div class="new_arrivals_title">Hot Best Sellers</div>
	<ul class="clearfix">
		<li class="active"></li>
	</ul>
	<div class="tabs_line"><span></span></div>
</div>

<div class="bestsellers_panel panel active">

	<!-- Best Sellers Slider -->

	<div class="bestsellers_slider slider">


		@foreach ($products as $product)
			@if ($product->best_seller==1)
		<!-- Best Sellers Item -->
		<div class="bestsellers_item discount">
			<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
				<div class="bestsellers_image"><img src="{{asset($product->image)}}" alt=""></div>
				<div class="bestsellers_content">
					<div class="bestsellers_category"><a href="#">{{$product->category->category_name}} > {{$product->subcategory->name}}</a></div>
					<div class="bestsellers_name"><a href="{{url('user/product/view/'.$product->id)}}">{{$product->brand}} {{$product->name}}</a></div>
					<div class="bestsellers_price discount">	
						@if ($product->discount_price==NULL)
						<div class="product_price discount">
							<span>{{number_format($product->price)}} L.L</span></div> 
						@else
							<div class="product_price discount">
								{{number_format($product->discount_price)}} L.L
								<span>{{number_format($product->price)}} L.L</span></div>  
						@endif</span></div>
				</div>
			</div>
			<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
			<ul class="bestsellers_marks">
				@if ($product->discount_price == NULL)
					<li class="bestsellers_mark bestsellers_new">new</li>
				@else
					@php
					$discount_percentage = ($product->price - $product->discount_price)/($product->price)*100;
					@endphp
				@endif
				<li class="bestsellers_mark bestsellers_discount">{{intval($discount_percentage)}}%</li>
				
			</ul>
		</div>
			@else
				
			@endif
		@endforeach

	


	</div>
</div>

</div>

</div>
</div>
</div>
</div>

<!-- Adverts -->

<!-- Trends -->

<div class="trends">
<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
<div class="trends_overlay"></div>
<div class="container">
<div class="row">

<!-- Trends Content -->
<div class="col-lg-3">
<div class="trends_container">
<h2 class="trends_title">Trending</h2>
<div class="trends_slider_nav">
	<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
	<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
</div>
</div>
</div>

<!-- Trends Slider -->
<div class="col-lg-9">
<div class="trends_slider_container">

<!-- Trends Slider -->

<div class="owl-carousel owl-theme trends_slider">
	<!-- Trends Slider Item -->
	@foreach ($products as $product)
		@if ($product->trending == 1)
		<div class="owl-item">
			<div class="trends_item">
				<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{$product->image}}" alt=""></div>
				<div class="trends_content">
					<div class="trends_category"><a href="#">{{$product->category->category_name}}</a></div>
					<div class="trends_info clearfix">
						
						<div class="trends_name"><a href="{{url('user/product/view/'.$product->id)}}"> <strong>{{$product->brand}}</strong> {{$product->name}}</a></div>
						<br>
						<div>{{$product->store->name}}</div>
						<div class="trends_price">
							@if ($product->discount_price==NULL)
							<div class="product_price discount">
								<span>{{number_format($product->price)}} L.L</span></div> 
							@else
								<div class="product_price discount">
									{{number_format($product->discount_price)}} L.L
									<span>{{number_format($product->price)}} L.L</span></div>  
							@endif
						</div>
					</div>
				</div>
				<ul class="trends_marks">
					 
				</ul>
				<div class="trends_fav"><i class="fas fa-heart"></i></div>
			</div>
		</div>
		@else
			
		@endif
	@endforeach
</div>
</div>
</div>

</div>
</div>
</div>




</div>



</div>
</div>
</div>
</div>
</div>
</div>
@endsection


</body>

</html>