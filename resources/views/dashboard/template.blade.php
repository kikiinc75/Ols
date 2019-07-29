<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('dash/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('dash/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('dash/css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('dash/css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('dash/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('dash/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('dash/img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        
</head>

<body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center"><img src="{{asset('dash/img/avatar-8.jpg')}}" alt="person"
                        class="img-fluid rounded-circle">
                    <h2 class="h5">{{Auth::user()->name}}</h2><span>{{Auth::user()->level}}</span>
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="{{url('dashboard')}}" class="brand-small text-center">
                        <strong>B</strong><strong class="text-primary">D</strong></a></div>
            </div>

            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Main</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">

                    <li class="@yield('dash-home','')"><a href="{{url('dashboard')}}"> <i class="icon-home"></i>Home</a></li>
                    <li class="@yield('dash-categorie','')"><a href="{{route('categorie.index')}}"> <i
                                class="icon-home"></i>Categorie </a></li>
                    <li class="@yield('dash-product','')"><a href="{{route('product.index')}}"> <i
                                class="icon-home"></i>Product </a></li>
                      <li class="@yield('dash-page','')"><a href="{{route('page.index')}}"> <i
                                class="icon-home"></i>Page </a></li>
                    <li class="@yield('dash-sale','')"><a href="{{url('dashboard/sale')}}"> <i class="icon-home"></i>Sale </a></li>
                    <li class="@yield('dash-vouchers','')"><a href="{{route('vouchers.index')}}"> <i class="icon-home"></i>Vouchers</a></li>
                     <li class=""><a href="{{url('dashboard/template')}}"><i class="icon-home"></i>Template</a></li>
                    {{-- <li><a href="forms.html"> <i class="icon-form"></i>Forms </a></li>
                    <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                    <li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-interface-windows"></i>Example dropdown </a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>
                    <li> <a href="#"> <i class="icon-mail"></i>Demo
                            <div class="badge badge-warning">6 New</div></a>
                    </li> --}}
                </ul>
            </div>
            {{-- <div class="admin-menu">
                <h5 class="sidenav-heading">Second menu</h5>
                <ul id="side-admin-menu" class="side-menu list-unstyled">
                    <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                    <li> <a href="#"> <i class="icon-flask"> </i>Demo
                            <div class="badge badge-info">Special</div></a></li>
                    <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                    <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
                </ul>
            </div> --}}
        </div>
    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                    class="icon-bars"></i></a><a href="{{url('dashboard')}}" class="navbar-brand">
                                <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong
                                        class="text-primary">Dashboard</strong>
                                </div>
                            </a></div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Notifications dropdown-->
                             
                             <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="nav-link"><i id="bell" class="fa fa-bell"></i>
                                    @if($notif->count())
                                    <span id="notif" class="badge badge-warning">{{$notif->count()}}</span></a>
                                    @endif
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                @foreach ($notif as $data)
                                
                                    <li><a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification d-flex justify-content-between">
                                                <div class="notification-content"><i class="fa fa-envelope"></i> {{$data->sale->nama}} Customer telah order</div>
                                                <div class="notification-time"><small>{{$data->created_at->format('d, M-Y-H:i')}}</small></div>
                                          
                                       @endforeach     
    
                                    <li><a rel="nofollow" href='{{url("dashboard/readpage")}}' class="dropdown-item all-notifications text-center">
                                            <strong> <i class="fa fa-bell"></i>view all notifications </strong></a></li>
                                </ul>

                            </li> 
                            <!-- Messages dropdown-->
                            {{-- <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="nav-link"><i class="fa fa-envelope"></i><span
                                        class="badge badge-info">10</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                            <div class="msg-profile"> <img src="{{asset('dash/img/avatar-1.jpg')}}"
                            alt="..." class="img-fluid rounded-circle">
                    </div>
                    <div class="msg-body">
                        <h3 class="h5">Jason Doe</h3><span>sent you a direct
                            message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                    </div>
                    </a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                            <div class="msg-profile"> <img src="{{asset('dash/img/avatar-2.jpg')}}" alt="..."
                                    class="img-fluid rounded-circle"></div>
                            <div class="msg-body">
                                <h3 class="h5">Frank Williams</h3><span>sent you a direct
                                    message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                            <div class="msg-profile"> <img src="{{asset('dash/img/avatar-3.jpg')}}" alt="..."
                                    class="img-fluid rounded-circle"></div>
                            <div class="msg-body">
                                <h3 class="h5">Ashley Wood</h3><span>sent you a direct
                                    message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">
                            <strong> <i class="fa fa-envelope"></i>Read all messages </strong></a></li>
                    </ul>
                    </li> --}}
                  
                    <!-- Log out-->
                    
                    <li class="nav-item"><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link logout">
                            <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    </ul>
                </div>
    </div>
    </nav>
    </header>

    @yield('content')

    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Distro Yogya &copy; 2019</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard"
                            class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('dash/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dash/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('dash/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dash/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('dash/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('dash/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dash/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}">
    </script>
    <script src="{{asset('dash/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('/dash/js/front.js')}}"></script>
    <script>

    $(document).ready(function() 
    {
         
        $(".fa-bell").click(function() 
        {
            $(".badge-warning").hide();
            
                $.get("<?php echo url('dashboard/notif/readall');?>",function()
                {
                
                });
        });

    });
           </script>
</body>

</html>


