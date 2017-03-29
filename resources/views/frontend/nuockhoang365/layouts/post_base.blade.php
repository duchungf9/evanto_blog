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
<div class="tagFocus hideClick">
    <ul class="tagFocusInner rs cf">
        <li class="active">
            <a href="#">{{$category->name}}</a>
        </li>
    </ul>
</div>
<div class="main hideClick">
    <div class="mainInner">
        <article class="mainLeft fullwidth">
            <div class="aPost">
                <header>
                    <h1 class="postTitle rs">{{$post->title}}</h1>
                    <div class="headInfo">
                        <span class="infoTime">at <span>{{$post->created_at}}</span></span>
                    </div>
                    <hr class="newContent" style="border-bottom: none;">
                </header>
                <div class="aPostContent">
                    <div class="aPostData">
                            {!! $post->content !!}
                    </div>
                </div>
                <div class="boxTagFooter">
                    <ul class="lstTags rs">
                        @foreach($tags as $tag)
                        <li>
                            <a href="#">{{$tag->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </article>
        <!--//aside-->

        <div class="newRelated">
            <div class="newRelatedTitle">POSTS IN {{$category->name}}</div>
            <div class="newRelatedGroup">
                @foreach($posts as $key=>$row)
                    @if($key==0)
                    <div class="newRelatedBig">
                        <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}">
                            <span><img src="{{$row->image}}" alt=""></span>
                            <strong>{{$row->title}}</strong>
                        </a>
                    </div>
                    <div class="line"></div>
                    @endif
                    @if($key==1)
                    <div class="newRelatedMid">
                        <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}">
                            <span><img src="{{$row->image}}" alt="{{$row->title}}"></span>
                            <strong>{{$row->title}}</strong>
                        </a>
                    </div>
                    <div class="line"></div>
                    @endif
                @endforeach
                <div class="newRelatedChild">
                @foreach($posts as $key=>$row)
                    @if($key==2)
                        <div class="childNew">
                            <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" class="thumbNail"><img src="{{$row->image}}" alt="{{$row->title}}">
                            </a>
                            <div>
                                <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" title="{{$row->title}}"><strong>{{$row->title}}</strong></a>
                                <span>{{$row->created_at}}</span>
                            </div>
                        </div>
                    @endif
                    @if($key==3)
                        <div class="childNew">
                            <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" class="thumbNail"><img src="{{$row->image}}" alt="{{$row->title}}">
                            </a>
                            <div>
                                <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" title="{{$row->title}}"><strong>{{$row->title}}</strong></a>
                                <span>{{$row->created_at}}</span>
                            </div>
                        </div>
                    @endif
                    @if($key==4)
                        <div class="childNew">
                            <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" class="thumbNail"><img src="{{$row->image}}" alt="{{$row->title}}">
                            </a>
                            <div>
                                <a href="{{URL::to('/')}}/{{$row->cat_slug}}/{{$row->slug}}" title="{{$row->title}}"><strong>{{$row->title}}</strong></a>
                                <span>{{$row->created_at}}</span>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mainInner">
        <div class="mainLeft">
            <div class="newLastest pdtn">
                <h2 class="newFocusTitle">Featured Posts</h2>
                @foreach($featured_posts as $key=>$post)
                <article class="aNewLastest">
                    <a class="imgThumb" href="{{URL::to('/')}}/{{$post->cat_slug}}/{{$post->slug}}"><img src="{{$post->image}}" alt="{{$post->title}}">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="{{URL::to('/')}}/{{$post->cat_slug}}/{{$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                        <div class="nameCat"><a href="{{URL::to('/')}}/{{$post->cat_slug}}">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->created_at}}</span>
                        </div>
                        <p>{{$post->summary}}</p>
                    </div>
                </article>
                @endforeach
            </div>
            <!--//newLastest-->
            <div class="spaceBig"></div>
        </div>
    </div>
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