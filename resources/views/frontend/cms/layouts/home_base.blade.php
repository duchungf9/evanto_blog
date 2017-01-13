<!DOCTYPE html>
<!-- saved from url=(0035)https://top5l.com/?s_nozip&s_update -->
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" style="height: 100%;">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    {!! \App\Http\Lib\Common::headGetMemcache() !!}
    <link href="{{URL::to('/')}}/frontend/cms/css/app.css" rel="stylesheet" type="text/css">
    @yield('head_style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="rs blog " style="position: relative; min-height: 100%; top: 0px;">
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
@include('frontend.cms.ViewComposers.HeaderAll')
<div class="main hideClick">
    @include('frontend.cms.ViewComposers.HomeMain')
    <!--//mainInner-->
</div>
<nav class="navBot hideClick">
    <a href="{{URL::to('/')}}/">Home Page</a>
</nav>
<div class="advbanner adv9 hideClick">
    <a href="https://top5l.com/?s_nozip&amp;s_update#"><img src="http://placehold.it/980x90" alt=""></a>
</div>
<footer class="hideClick">
    <div class="footerInner">
        <div class="infoBox">
            <div class="titleInfoBox">Social</div>
            <div class="contentInfoBox taj">

            </div>
        </div>
    </div>
</footer>
<script src="{{URL::to('/')}}/frontend/cms/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/frontend/cms/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/frontend/cms/js/blog.js" type="text/javascript"></script>
</body>
</html>