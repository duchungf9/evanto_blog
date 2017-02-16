<section class="navLink hideClick">
    <ul class="nlBox rs">
        <li><a href="javascript:void(0);">Sample</a></li>
        <li class="dotCircle"></li>
        <li><a href="javascript:void(0);">Sample</a></li>
        <li class="dotCircle"></li>
        <li><a href="javascript:void(0);">Sample</a></li>
    </ul>
</section>
<header class="hdTop hideClick">
    <div class="hdTopBox">
        <h1 class="logo"><a href="javascript:void(0);" title="">Sample Logo</a></h1>
        <div class="hashTag">
            <a href="javascript:void(0);"><strong>#top 5</strong></a>
            <a href="javascript:void(0);"><strong>#top 10</strong></a>
        </div>
        <div class="searchBox">
            <form action="{{URL::to('/').'/search'}}" method="get">
                <input class="txtSearch" type="text" name="keywords" value="" placeholder="Type here to search...">
                <input class="btnSearch" type="submit" value="search">
            </form>

        </div>
    </div>
</header>
<div class="nvTopMobile">
    <div class="headMobile">
        <div class="hmLeft">
            <a href="javascript:void(0);" title=""><img src="{{URL::to('/')}}/frontend/cms/icon.png" width="35" height="35" alt="Logo"></a>
            7-CMS.COM
        </div>
        <div id="navMenuBox" class="navMenuBox">
            <span class="lmenu"></span>
            <span class="lmenu"></span>
            <span class="lmenu"></span>
        </div>
    </div>
</div>
<nav id="nvTop" class="nvTop">
    <ul class="lstMenuTop rs">
        <li><a href="https://top5l.com/?s_nozip&amp;s_update#" class="home"><img src="{{URL::to('/')}}/frontend/cms/icon.png" width="43" height="43" alt="Top5l Logo"></a></li>
        @foreach($menus as $menu)
            <li><a href="#" title="{{$menu->name}}">{{$menu->name}}</a></li>
        @endforeach
    </ul>
</nav>
<div class="advbanner adv1 hideClick"><img src="http://placehold.it/980x90" alt=""></div>