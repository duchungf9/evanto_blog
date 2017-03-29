<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{URL::to('/')}}/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{URL::to('/')}}/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{URL::to('/')}}/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- CSRF Token -->
    @yield('head_style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>



<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/logo.png" class="logo"/>
                </a>
            </div>
        </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li >
                        <a href="/admin/dashboard" ><i class="fa fa-desktop"></i>Dashboard</a>
                    </li>
                    <li onclick="show('page');">
                        <a href="javascript:void(0);" ><i class="fa fa-flag"></i>Pages</a>
                    </li>
                    <li class="child" data-parent="page">
                        <a href="/admin/page/" ><i class="fa fa-plus-circle"></i> create new Page</a>
                    </li>
                    <li class="child" data-parent="page">
                        <a href="/admin/page/list" ><i class="fa fa-bars"></i> List Categories</a>
                    </li>
                    <li onclick="show('category');">
                        <a href="javscirpt:void(0);" ><i class="fa fa-bars"></i>Categories</a>
                    </li>
                        <li class="child" data-parent="category">
                            <a href="/admin/category/" ><i class="fa fa-plus-circle"></i> create new Category</a>
                        </li>
                        <li class="child" data-parent="category">
                            <a href="/admin/category/list" ><i class="fa fa-bars"></i> List Categories</a>
                        </li>
                    <li onclick="show('post');">
                        <a href="javascript:void(0);" ><i class="fa fa-file-text-o"></i>Posts</a>
                    </li>
                        <li class="child" data-parent="post">
                            <a href="/admin/post/" ><i class="fa fa-plus-circle"></i> create new Posts</a>
                        </li>
                        <li class="child" data-parent="post">
                            <a href="/admin/post/list" ><i class="fa fa-bars"></i> List Posts</a>
                        </li>
                        <li class="child" data-parent="post">
                            <a href="/admin/post/featured" ><i class="fa fa-heart"></i> Featured Posts</a>
                        </li>

                    <li onclick="show('product');">
                        <a href="javascript:void(0);" ><i class="fa fa-file-text-o"></i>Products</a>
                    </li>
                    <li class="child" data-parent="product">
                        <a href="/admin/post/" ><i class="fa fa-plus-circle"></i> create new Products</a>
                    </li>
                    <li class="child" data-parent="product">
                        <a href="/admin/post/list" ><i class="fa fa-bars"></i> List Products</a>
                    </li>
                    <li class="child" data-parent="product">
                        <a href="/admin/post/featured" ><i class="fa fa-heart"></i> Featured Products</a>
                    </li>

                    <li >
                        <a href="/admin/media/list" ><i class="fa fa-image"></i>Media Manager</a>
                    </li>
                    {{--<li >--}}
                        {{--<a href="/admin/settings/slider" ><i class="fa fa-th-list"></i>Home's Slider</a>--}}
                    {{--</li>--}}
                    <li >
                        <a href="/admin/settings/profile" ><i class="fa fa-user"></i>Edit Profile</a>
                    </li>
                    <li onclick="show('site');">
                        <a href="javascript:void(0);" ><i class="fa fa-cog"></i>Site settings</a>
                    </li>

                    <li class="child" data-parent="site">
                        <a href="/admin/settings/site" ><i class="fa fa-star-o"></i>settings/configs/META SEO</a>
                    </li>
                    <li class="child" data-parent="site">
                        <a href="/admin/settings/menu" ><i class="fa fa-star-o"></i>Menu (home page menu)</a>
                    </li>
                    {{--<li class="child" data-parent="site">--}}
                        {{--<a href="/admin/settings/module" ><i class="fa fa-star-o"></i>Modules config</a>--}}
                    {{--</li>--}}
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            @yield('content')
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<div class="footer">


    <div class="row">
        <div class="col-lg-12" >
        </div>
    </div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->

<script src="{{URL::to('/')}}/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<!-- CUSTOM SCRIPTS -->
<script src="{{URL::to('/')}}/js/custom.js"></script>
@yield('footer_script')
<script>
    $(".child").hide();
    function show(cat){
        $("li[data-parent="+cat+"]").toggle();
    }
</script>
</body>
</html>

