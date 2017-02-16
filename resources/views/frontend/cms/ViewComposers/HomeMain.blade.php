<div class="mainInner">
    <section class="mainLeft">
        <div class="newHot">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key==0)
                        <article class="aNewHotBig">
                            <a class="imgThumb" href="{{URL::to('/')}}/{{$post->cat_slug}}/{{$post->slug}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <h2 class="rs"><a href="{{URL::to('/')}}/{{$post->cat_slug}}/{{$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h2>
                            <p>{{$post->summary}}</p>
                        </article>
                    @endif
                    @if($key==1)
                            <article class="aNewHot firstH">
                                <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url({{$post->image}}) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="{{$post->title}}"></a>
                                <h2 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h2>
                                <p>{{$post->summary}}</p>
                            </article>
                    @endif
                    @if($key>=2 and $key<=4)
                            <article class="aNewHot">
                                <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}"><img src="{{$post->image}}" alt="{{$post->image}}"></a>
                                <h4 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h4>
                            </article>
                    @endif
                @endforeach
            @endif
        </div>
        <!--//newHotLeft-->
        <div class="newLastest">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key>=5 and $key<=8)
                        <article class="aNewLastest">
                            <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="{{URL::to('/').'/'.$post->cat_slug}}">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->created_at}}</span></div>
                                <p>{{$post->summary}}</p>
                            </div>
                        </article>
                    @endif
                @endforeach
            @endif
        </div>
        <!--//newLastest-->
        <div class="newFocus">
            <div class="titleNewFocus">Featured Posts</div>
            @if(isset($params['featured_posts']))
                @foreach($params['featured_posts'] as $post)
                    <article class="aNewFocus">
                    <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                    <div class="aNewFocusInfo">
                        <h2 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h2>
                        <div class="nameCat"><a href="{{URL::to('/').'/'.$post->cat_slug}}">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->created_at}}</span></div>
                        <p>{{$post->summary}}</p>
                    </div>
                </article>
                @endforeach
            @endif

        </div>
        <div class="lineSpace"></div>
        <div class="newLastest bdbn">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key>=9 and $key<=13)
                        <article class="aNewLastest">
                            <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="{{URL::to('/').'/'.$post->cat_slug}}">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->created_at}}</span></div>
                                <p>{{$post->summary}}</p>
                            </div>
                        </article>
                    @endif
                @endforeach
            @endif
        </div>
        <!--//newLastest-->
    </section>
    <aside class="mainRight">
        <div class="advbanner adv2 mb">
            <iframe src="http://placehold.it/300x500" width="300" frameborder="0" scrolling="no" height="500"></iframe>
        </div>
        <div class="advbanner adv3 mb">
            <img border="0" id="ads_zone50_banner398065" src="http://placehold.it/300x250" width="300" height="250">
        </div>
        <div class="advbanner adv4 mb">
            <iframe src="http://placehold.it/300x250" width="300" frameborder="0" scrolling="no" height="250"></iframe>
        </div>
        <div class="advbanner adv5 mb">
            <iframe src="http://placehold.it/300x250" width="300" frameborder="0" scrolling="no" height="250"></iframe>
        </div>
        <div class="advbanner adv6 mb">
            <img class="adnzone_9985_img" border="0" id="cpm9985" src="http://placehold.it/300x250" width="300" height="250">
        </div>
        <div class="advbanneradv7 mb">
            <iframe src="http://placehold.it/300x250" width="300" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </aside>
    <!--//aside-->
    <div class="boxCat">
        @if(isset($params['categories']))
            @foreach($params['categories'] as $key=>$cat)
                @if($key>=0 and $key<=2)
                    <section class="newCat">
                        <h2 class="newCatTitle"><a href="{{URL::to('/').'/'.$cat->slug}}">{{str_limit($cat->name,20,"...")}}</a></h2>
                        @if(isset($cat->posts))
                            @foreach($cat->posts as $post)
                                <article class="aNewCatBig">
                                    <a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}" class="imgThumb"><img src="{{$post->image}}" alt="{{str_limit($post->title,20,'..')}}"></a>
                                    <h3 class="rs"><a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}" title="{{$post->title}}">{{str_limit($post->description,100,'..')}}</a></h3>
                                </article>
                            @endforeach
                        @endif
                    </section>
                @endif
            @endforeach
        @endif
    </div>
    <section class="mainLeft">
        <div class="newLastest pdtn">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key>=14 and $key<=19)
                        <article class="aNewLastest">
                            <a class="imgThumb" href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="{{URL::to('/').'/'.$post->cat_slug}}">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->created_at}}</span></div>
                                <p>{{$post->summary}}</p>
                            </div>
                        </article>
                    @endif
                @endforeach
            @endif
        </div>
        <!--//newLastest-->
    </section>
    <aside class="mainRight">
        <div class="advbanner adv2">
            <iframe src="http://placehold.it/300x500" width="300" frameborder="0" scrolling="no" height="500"></iframe>
        </div>
    </aside>
    <!--//aside-->
</div>
<div class="mainInner">
    <div class="mainLeft">
        <div class="boxCatMini">
            @if(isset($params['categories']))
                @foreach($params['categories'] as $key=>$cat)
                    @if($key>=3)
                        <section class="newCatMini">
                            <h2 class="newCatMiniTitle"><a href="{{URL::to('/').'/'.$cat->slug}}" title="{{$cat->name}}">{{$cat->name}}</a></h2>
                            @if(isset($cat->posts))
                                @foreach($cat->posts as $post)
                                    <article class="aNewCatMiniBig">
                                        <a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}" class="imgThumb"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                                        <h3 class="rs"><a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}">{{$post->description}}</a></h3>
                                    </article>
                                @endforeach
                            @endif
                        </section>
                        <div class="line"></div>
                    @endif
                @endforeach
             @endif
        </div>
        <div class="spaceBig"></div>
    </div>
    <div class="mainRight">
        <div class="advbanner adv2">
            <iframe src="http://placehold.it/300x600" width="300" frameborder="0" scrolling="no" height="600"></iframe>
        </div>
    </div>
</div>