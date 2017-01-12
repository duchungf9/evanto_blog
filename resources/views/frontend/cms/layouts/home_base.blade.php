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
            <div class="titleInfoBox">Liên hệ</div>
            <div class="contentInfoBox taj">
                Là blog nhóm cá nhân note, bookmark, tổng hợp chia sẻ các điều, link hữu ích hướng thiện cho cộng đồng. Nếu cảm thấy hữu ích đừng quên like Fanpage
                để động viên nhóm, cũng như SHARE bài viết để chia sẻ những điều hay, hữu ích tới mọi người.
                <br>
                Có thể blog sẽ có những bài viết đánh giá top 5, 10 theo cảm nhận cá nhân nhưng sẽ không bao giờ có ý định làm ảnh hưởng đến bất kỳ một cá nhân tổ chức nào.<br>
                Nếu có vấn đề mọi email góp ý xin nhắn tin offline gửi về Fanpage: <a href="https://www.facebook.com/top5link/">Top5L</a>
                <br>
            </div>
        </div>
        <div class="line"></div>
        <div class="infoBox">
            <div class="titleInfoBox">Liên kết</div>
            <div class="contentInfoBox">
                <ul class="rs linkFriend">
                    <li><a href="https://game.top5l.com/">Game mini</a></li>
                    <li><a href="https://top5l.com/?s_nozip&amp;s_update#">Afamily</a></li>
                    <li><a href="https://top5l.com/?s_nozip&amp;s_update#">Kênh 14</a></li>
                    <li><a href="https://top5l.com/?s_nozip&amp;s_update#">Dân Trí</a></li>
                    <li><a href="https://top5l.com/?s_nozip&amp;s_update#">VnExpress</a></li>
                </ul>
            </div>
        </div>
        <div class="line"></div>
        <div class="infoBox">
            <div class="titleInfoBox">Mạng xã hội</div>
        </div>
    </div>
</footer>
<script src="{{URL::to('/')}}/frontend/cms/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/frontend/cms/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/frontend/cms/js/blog.js" type="text/javascript"></script>
</body>
</html>