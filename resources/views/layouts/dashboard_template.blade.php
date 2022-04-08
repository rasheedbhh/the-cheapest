<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>The Cheapest</title>

    <!-- vendor css -->
    <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/lib/fontawesome-free-5.15.4-web/css/font-awesome.css')}}">
    <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- Starlight CSS -->
<link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
    <!--Datatable-->
 <link href="{{asset('backend/lib/highlightjs/github.css')}}" rel="stylesheet">
 <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
 <link href="{{asset('backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
 
 


  </head>

  <body>
   


     <!-- ########## START: LEFT PANEL ########## -->
     <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> The Cheapest</a></div>
     <div class="sl-sideleft">

 
       <label class="sidebar-label">Navigation</label>
     
       <div class="sl-sideleft-menu">  
         @can('admin')
         <a href="{{route('home')}}" class="sl-menu-link active">
           <div class="sl-menu-item">
             <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
             <span class="menu-item-label">Dashboard</span>
           </div><!-- menu-item -->
         </a><!-- sl-menu-link -->    
         
         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
            <span class="menu-item-label">Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('add.user')}}" class="nav-link">Create User</a></li>
          <li class="nav-item">
            <a href="{{route('all.users')}}" class="nav-link">All users</a></li>
        </ul>

   

         <a href="#" class="sl-menu-link">
           <div class="sl-menu-item">
             <i class="menu-item-icon ion-ionic tx-20"></i>
             <span class="menu-item-label">Categories</span>
             <i class="menu-item-arrow fa fa-angle-down"></i>
           </div><!-- menu-item -->
         </a><!-- sl-menu-link -->
         <ul class="sl-menu-sub nav flex-column">
           <li class="nav-item"><a href="{{route('add.category')}}" class="nav-link">Add Category</a></li>
           <li class="nav-item"><a href="{{route('all.categories')}}" class="nav-link">All Categories</a></li>
         </ul>

         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Subcategories</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('add.subcategory')}}" class="nav-link">Add Subcategory</a></li>
          <li class="nav-item"><a href="{{route('all.subcategories')}}" class="nav-link">All Subcategories</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-pricetags tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
           <li class="nav-item"><a href="{{url('admin/all/products')}}" class="nav-link">All Products</a></li>
        </ul>

     
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-bag tx-20"></i>
            <span class="menu-item-label">Stores</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('add.store')}}" class="nav-link">Create store</a></li>
          <li class="nav-item">
            <a href="{{route('all.stores')}}" class="nav-link">All stores</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-cash tx-20"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('admin.orders')}}" class="nav-link">All orders</a></li>
        </ul>   
         @endcan
         @can('manager')
         <a href="{{route('home')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->    
        
         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-bag tx-20"></i>
            <span class="menu-item-label">My Store</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('manager.edit.store')}}" class="nav-link">Edit store info</a></li>
        </ul> 

         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-pricetag tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{route('manager.all.products')}}" class="nav-link">All products</a></li>
            <li class="nav-item">
              <a href="{{route('manager.add.product')}}" class="nav-link">Add product</a></li>
        </ul> 

         <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-cash tx-20"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item">
            <a href="{{url('manager/my/orders')}}" class="nav-link">All orders</a></li>
        </ul> 
         @endcan
         @can('user')
         <a href="" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">My Wishlist</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->   

        <a href="{{route('home')}}" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Home</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->   
        @endcan 
 </div><!-- sl-sideleft-menu -->
  
       <br>
     </div><!-- sl-sideleft -->
     <!-- ########## END: LEFT PANEL ########## -->
 
     <!-- ########## START: HEAD PANEL ########## -->
     <div class="sl-header">
       <div class="sl-header-left">
         <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
         <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
       </div><!-- sl-header-left -->
       <div class="sl-header-right">
         <nav class="nav">
           <div class="dropdown">
             <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
               <span class="logged-name">{{Auth::user()->name}}</span>
               @if (Auth::user()->profile_photo_path)
                  <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" class="wd-32 rounded-circle" alt="">
               @else
                   <img src="{{asset('frontend/images/user-icon-png-pnglogocom-133466.jpg')}}" class="wd-32 rounded-circle" alt="">
               @endif
               
             </a>
             <div class="dropdown-menu dropdown-menu-header wd-200">
               <ul class="list-unstyled user-profile-nav">
                 <li><a href="{{route('profile.show')}}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                 <form method="POST" action="{{ route('logout') }}">
                  @csrf
                 <li><a href="{{route('logout')}}"  onclick="event.preventDefault();
                  this.closest('form').submit();"><i class="icon ion-power"></i>{{ __('Log Out') }}</a></li>
               </form>
               </ul>
             </div><!-- dropdown-menu -->
           </div><!-- dropdown -->
         </nav>
       </div>
     </div>
     
    @yield('content')

    <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>

    <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('backend/lib/select2/js/select2.min.js')}}"></script> 

    <script>
      $(function(){
        'use strict';
    
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
    
        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });
    
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
    
      });
    </script>

    <script src="{{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('backend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>

    <script src="{{asset('backend/js/starlight.js')}}"></script>
    <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    
    <script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>


    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
       
           <script>
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Clicked, This will be Permanently Delete the Record!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Operation Cancelled!");
                  }
                });
            });
    </script>


  

  </body>
</html>
