<div class="mainInner">
    <section class="mainLeft">
        <div class="newHot">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key==0)
                        <article class="aNewHotBig">
                            <a class="imgThumb" href="#"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <h2 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h2>
                            <p>{{$post->summary}}</p>
                        </article>
                    @endif
                    @if($key==1)
                            <article class="aNewHot firstH">
                                <a class="imgThumb" href="#"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url({{$post->image}}) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="{{$post->title}}"></a>
                                <h2 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h2>
                                <p>{{$post->summary}}</p>
                            </article>
                    @endif
                    @if($key>=2 and $key<=4)
                            <article class="aNewHot">
                                <a class="imgThumb" href="#"><img src="{{$post->image}}" alt="{{$post->image}}"></a>
                                <h4 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h4>
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
                            <a class="imgThumb" href="#"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="#">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->updated_at}}</span></div>
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
                    <a class="imgThumb" href="#" title="{{$post->title}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                    <div class="aNewFocusInfo">
                        <h2 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h2>
                        <div class="nameCat"><a href="#">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->updated_at}}</span></div>
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
                            <a class="imgThumb" href="#"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="#">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->updated_at}}</span></div>
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
                        <h2 class="newCatTitle"><a href="#">{{$cat->name}}</a></h2>
                        <article class="aNewCatBig">
                            <a href="#" class="imgThumb"><img src="http://placehold.it/320x276" alt="{{$cat->name}}"></a>
                            <h3 class="rs"><a href="#" title="{{$cat->name}}">{{$cat->description}}</a></h3>
                        </article>
                        <article class="aNewCat">
                            <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                            <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
                        </article>
                        <article class="aNewCat">
                            <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                            <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
                        </article>
                    </section>
                @endif
            @endforeach
        @endif
        <section class="newCat">
            <h2 class="newCatTitle"><a href="https://top5l.com/top-suc-khoe">Sức khỏe</a></h2>
            <article class="aNewCatBig">
                <a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" class="imgThumb"><img src="http://placehold.it/320x276" alt="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời"></a>
                <h3 class="rs"><a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" title="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời">Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời</a></h3>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
        </section>
        <section class="newCat">
            <h2 class="newCatTitle"><a href="https://top5l.com/top-suc-khoe">Sức khỏe</a></h2>
            <article class="aNewCatBig">
                <a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" class="imgThumb"><img src="http://placehold.it/320x276" alt="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời"></a>
                <h3 class="rs"><a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" title="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời">Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời</a></h3>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
        </section>
        <section class="newCat">
            <h2 class="newCatTitle"><a href="https://top5l.com/top-suc-khoe">Sức khỏe</a></h2>
            <article class="aNewCatBig">
                <a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" class="imgThumb"><img src="http://placehold.it/320x276" alt="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời"></a>
                <h3 class="rs"><a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top" title="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời">Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời</a></h3>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
            <article class="aNewCat">
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="imgThumb"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background: url(http://placehold.it/60x60) no-repeat center center;background-size: cover;display: block;width: 100%;" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"></a>
                <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</a>
            </article>
        </section>

    </div>
    <section class="mainLeft">
        <div class="newLastest pdtn">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    @if($key>=14 and $key<=19)
                        <article class="aNewLastest">
                            <a class="imgThumb" href="#"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
                            <div class="aNewLastestInfo">
                                <h3 class="rs"><a href="#" title="{{$post->title}}">{{$post->title}}</a></h3>
                                <div class="nameCat"><a href="#">{{$post->name}}</a><span class="nameCatSpace">-</span><span class="nameCatTime">{{$post->updated_at}}</span></div>
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
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
            <div class="line"></div>
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
            <div class="line"></div>
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
            <div class="line"></div>
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
            <div class="line"></div>
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
            <div class="line"></div>
            <section class="newCatMini">
                <h2 class="newCatMiniTitle"><a href="https://top5l.com/top-cong-nghe" title="Công nghệ">Công nghệ</a></h2>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
                <article class="aNewCatMiniBig">
                    <a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top" class="imgThumb"><img src="http://placehold.it/210x137" alt="Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016"></a>
                    <h3 class="rs"><a href="https://top5l.com/top-cong-nghe/top-5-hanh-vi-xam-hai-quyen-rieng-tu-ca-nhan-tren-mang-internet-2016-56.top">Top 5 hành vi xâm hại quyền riêng tư cá nhân trên mạng internet 2016</a></h3>
                </article>
            </section>
        </div>
        <div class="spaceBig"></div>
    </div>
    <div class="mainRight">
        <div class="advbanner adv2">
            <iframe src="http://placehold.it/300x600" width="300" frameborder="0" scrolling="no" height="600"></iframe>
        </div>
    </div>
</div>