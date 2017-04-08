<!DOCTYPE html>
<html>
<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
    {!! \App\Http\Lib\Common::headGetMemcache() !!}
    <link rel="shortcut icon" href="http://laviewater.vn/wp-content/uploads/2016/11/favicon.png"/>
    <link href="https://plus.google.com/107515763736347546999" rel="publisher"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700italic,800italic,700,800&amp;subset=latin,vietnamese"rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{URL::to('/')}}/frontend/nuockhoang365/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{URL::to('/')}}/frontend/nuockhoang365/css/home.css"/>
    @yield('head_style')
    <meta content='TL' name='generator'/>
    <!--[if lte IE 8]>
    <script src="{{URL::to('/')}}/frontend/nuockhoang365/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="{{URL::to('/')}}/frontend/nuockhoang365/css/ie.css" type="text/css"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
</head>
<body>
<div class="wrapper pr">
    <header class="pr">
        <nav>
            <div class="fixCen">
                <h1 class="rs">
                    <a href="/" class="logo" title="Nước khoáng LaVie">
                        <img src="{{URL::to('/')}}/frontend/nuockhoang365/images/logo.png" class="imgFull" alt="Nước khoáng LaVie" width="244" height="139">
                    </a>
                    <a href="tel:0962632231" class="hotline-top" title="Gọi ngay hotline">0962632231 - </a>
                    <a href="tel:0979332708" class="hotline-top" title="Gọi ngay hotline">0979332708</a>
                </h1>
                @include('frontend.nuockhoang365.ViewComposers.HeaderAll')
            </div>
            <a href="javascript:void(0)" class="responsive-menu-toggle"></a>
        </nav>
        <div id="banner_header">
            <div class="fixCen">
                <div id="slogan">
                    <img src="http://laviewater.vn/wp-content/uploads/revslider/shop/header_txt.png" class="imgFull"
                         alt="">
                </div>
                <div id="product1" class="sp-pr">
                    <img src="http://laviewater.vn/wp-content/uploads/revslider/shop/Lavie-19l.png" class="imgFull"
                         alt="">
                </div>
                <div id="product2" class="sp-pr">
                    <img src="http://laviewater.vn/wp-content/uploads/revslider/shop/Lavie-19l.png" class="imgFull"
                         alt="">
                </div>
                <div id="product3" class="sp-pr">
                    <img src="http://laviewater.vn/wp-content/uploads/revslider/shop/Lavie-19l.png" class="imgFull"
                         alt="">
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <div class="hot-line-bottom px" style="background-color: red;">
        <span>Hotline: </span> <a href="tel:0979332708">0979332708</a>
        <span>Hotline: </span> <a href="tel:0962632231">0962632231</a>
    </div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/58db72c9f97dd14875f5aa0b/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/nuockhoang365/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/nuockhoang365/js/SmoothScroll.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/nuockhoang365/js/common.js"></script>
<script>
    $(".main-nav").find('li').on('mouseover',function(){
        $(this).addClass('active');
    });
    $(".main-nav").find('li').on('mouseout',function(){
        $(this).removeClass('active');
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-97050284-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
