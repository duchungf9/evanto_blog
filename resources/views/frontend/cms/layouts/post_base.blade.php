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
                <div class="newRelatedBig">
                    <a href="#">
                        <span><img src="#" alt=""></span>
                        <strong>FA lâu năm sẽ tổn hại tinh thần sinh hoang tưởng sức khỏe suy giảm</strong>
                    </a>
                </div>
                <div class="line"></div>
                <div class="newRelatedMid">
                    <a href="https://top5l.com/top-suc-khoe/top-3-vo-trai-cay-cuc-ky-huu-ich-cho-nhan-sac-bo-di-la-phi-cua-gioi-65.top">
                        <span><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/votraicay01-1482812463410.jpg" alt="Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời"></span>
                        <strong>Top 3 vỏ trái cây cực kỳ hữu ích cho nhan sắc, bỏ đi là phí của giời</strong>
                    </a>
                </div>
                <div class="line"></div>
                <div class="newRelatedChild">
                    <div class="childNew">
                        <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" class="thumbNail"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/soha-game-game-soc-vui-top-10-cach-lam-tap-trung-khi-lam-viec-van-phong.jpg" alt="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê">
                        </a>
                        <div>
                            <a href="https://top5l.com/top-suc-khoe/top-10-cach-giu-dau-oc-tinh-tao-khong-can-den-ca-phe-25.top" title="Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê"><strong>Top 10 cách giữ đầu óc tỉnh táo không cần đến cà phê</strong></a>
                            <span>2016-12-19 12:00:51</span>
                        </div>
                    </div>
                    <div class="childNew">
                        <a href="https://top5l.com/top-suc-khoe/top-11-duong-chat-tot-nhat-cho-su-phat-trien-tri-nao-cua-tre-24.top" class="thumbNail"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/img20160821200829241.jpg" alt="Top 11 dưỡng chất tốt nhất cho sự phát triển trí não của trẻ">
                        </a>
                        <div>
                            <a href="https://top5l.com/top-suc-khoe/top-11-duong-chat-tot-nhat-cho-su-phat-trien-tri-nao-cua-tre-24.top" title="Top 11 dưỡng chất tốt nhất cho sự phát triển trí não của trẻ"><strong>Top 11 dưỡng chất tốt nhất cho sự phát triển trí não của trẻ</strong></a>
                            <span>2016-12-19 11:46:58</span>
                        </div>
                    </div>
                    <div class="childNew">
                        <a href="https://top5l.com/top-suc-khoe/top-10-tac-hai-khi-bo-me-hon-nhien-cho-be-su-dung-smartphone-22.top" class="thumbNail"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/tac-hai-cua-dien-thoai-thong-minh-voi-tre.jpg" alt="Top 10 tác hại khi bố mẹ &quot;hồn nhiên&quot; cho bé sử dụng smartphone">
                        </a>
                        <div>
                            <a href="https://top5l.com/top-suc-khoe/top-10-tac-hai-khi-bo-me-hon-nhien-cho-be-su-dung-smartphone-22.top" title="Top 10 tác hại khi bố mẹ &quot;hồn nhiên&quot; cho bé sử dụng smartphone"><strong>Top 10 tác hại khi bố mẹ "hồn nhiên" cho bé sử dụng smartphone</strong></a>
                            <span>2016-12-19 11:32:56</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mainInner">
        <div class="mainLeft">
            <div class="newLastest pdtn">
                <h2 class="newFocusTitle">Tin Nổi Bật</h2>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-video/top-10-video-pho-bien-nhat-youtube-viet-nam-youtube-rewind-viet-nam-2016-49.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/soha-game-game-soc-vui-image-1481163885-youtube-rewind-2016-group-2.png" alt="Top 10 video phổ biến nhất Youtube Việt Nam 2016 (YouTube Rewind Việt Nam)">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-video/top-10-video-pho-bien-nhat-youtube-viet-nam-youtube-rewind-viet-nam-2016-49.top" title="Top 10 video phổ biến nhất Youtube Việt Nam 2016 (YouTube Rewind Việt Nam)">Top 10 video phổ biến nhất Youtube Việt Nam 2016 (YouTube Rewind Việt Nam)</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-video">Video hay</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 10:48:29</span>
                        </div>
                        <p>Youtube Rewind được sản xuất bởi chính Yotube và trở thành một truyền thống của mạng xã hội chia sẻ video lớn nhất thế giới. Youtube Rewind có thể được coi là tết của các Creator, nơi sự sáng tạo được tụ hội chỉ trong vài phút ngắn ngủi, một đoạn video tổng quan của cả một năm hoạt động không biết ngừng nghỉ.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-video/top-10-video-am-nhac-duoc-xem-nhieu-nhat-youtube-trong-nam-2015-48.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/soha-game-game-soc-vui-top10-video-am-nhac.png" alt="Top 10 video âm nhạc được xem nhiều nhất Youtube trong năm 2015">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-video/top-10-video-am-nhac-duoc-xem-nhieu-nhat-youtube-trong-nam-2015-48.top" title="Top 10 video âm nhạc được xem nhiều nhất Youtube trong năm 2015">Top 10 video âm nhạc được xem nhiều nhất Youtube trong năm 2015</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-video">Video hay</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 10:07:54</span>
                        </div>
                        <p>"See You Again" của Wiz Khalifa, nhạc phim Fast and Furiuos 7 đã trở thành ca khúc đứng đầu top 10 MV xem nhiều nhất trên Youtube năm vừa qua.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-video/top-10-video-co-luong-views-khung-bo-nhat-youtube-nam-2014-47.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/soha-game-game-soc-vui-youtube-top-10.png" alt="Top 10 video có lượng views &quot;khủng bố&quot; nhất YouTube năm 2014">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-video/top-10-video-co-luong-views-khung-bo-nhat-youtube-nam-2014-47.top" title="Top 10 video có lượng views &quot;khủng bố&quot; nhất YouTube năm 2014">Top 10 video có lượng views "khủng bố" nhất YouTube năm 2014</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-video">Video hay</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 09:47:52</span>
                        </div>
                        <p>Với hơn 2 tỷ lượt xem, Gangnam Style của PSY vẫn đang tỏ ra "vô đối" trên YouTube. Hồi đầu tháng 12/2014, video ca khúc Gangnam Style của PSY đã làm "hỏng" bộ đếm của YouTube khi đạt hơn 2 tỷ lượt xem, vượt quá 32-bit, buộc dịch vụ này phải nâng cấp bộ đếm của mình.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-game/top-5-game-android-hay-nhat-5-nam-do-kenh-youtube-android-gamespot-chon-46.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/photo-0-1481985087480.gif" alt="Top 5 game Android hay nhất 5 năm do kênh youtube Android Gamespot chọn">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-game/top-5-game-android-hay-nhat-5-nam-do-kenh-youtube-android-gamespot-chon-46.top" title="Top 5 game Android hay nhất 5 năm do kênh youtube Android Gamespot chọn">Top 5 game Android hay nhất 5 năm do kênh youtube Android Gamespot chọn</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-game">Game</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 09:34:47</span>
                        </div>
                        <p>Dưới đây là bảng xếp hạng game Android hay nhất, xuất sắc nhất trong vòng 5 năm qua được kênh youtube Android Gamespot bình chọn.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-game/top-5-game-mobile-online-duoc-gamer-yeu-thich-nhat-2016-tai-viet-nam-45.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/3-1481890544386.jpg" alt="Top 5 game mobile online được gamer yêu thích nhất 2016 tại Việt Nam">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-game/top-5-game-mobile-online-duoc-gamer-yeu-thich-nhat-2016-tai-viet-nam-45.top" title="Top 5 game mobile online được gamer yêu thích nhất 2016 tại Việt Nam">Top 5 game mobile online được gamer yêu thích nhất 2016 tại Việt Nam</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-game">Game</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 09:25:53</span>
                        </div>
                        <p>Dưới đây là những tựa game mobile online đã được phát hành tại Việt Nam năm 2016 mà người Việt yêu thích nhất. Bạn đã thử hết chưa?</p>
                    </div>
                </article>
            </div>
            <!--//newLastest-->
            <div class="spaceBig"></div>
        </div>
        <div class="mainRight">
            <div class="advbanner adv2 mb">
                <a href="http://ho.lazada.vn/SHLuBE?file_id=149537" target="_blank"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/6947_VNHATetcampaign-KangarooBuy1get1free11.jpg" width="300" height="600" border="0">
                </a><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/aff_i(1)" width="1" height="1" style="position:fixed;top: -9999px;">
            </div>
        </div>
    </div>
    <!--//mainInner-->

    <div class="mainInner">
        <div class="mainLeft">
            <div class="newLastest pdtn">
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-game/top-5-tua-game-nay-se-khien-nguoi-choi-sot-sinh-sich-trong-nam-2017-44.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/2-1482165618101.jpg" alt="Top 5 tựa game này sẽ khiến người chơi &quot;sốt sình sịch&quot; trong năm 2017">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-game/top-5-tua-game-nay-se-khien-nguoi-choi-sot-sinh-sich-trong-nam-2017-44.top" title="Top 5 tựa game này sẽ khiến người chơi &quot;sốt sình sịch&quot; trong năm 2017">Top 5 tựa game này sẽ khiến người chơi "sốt sình sịch" trong năm 2017</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-game">Game</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 09:05:27</span>
                        </div>
                        <p>Không chỉ gây sốt tại thị trường ĐNÁ, những game mobile này còn hứa hẹn "mang bão" đến cả thị trường quốc tế trong nay mai.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-khuyen-mai/top-7-su-that-ve-ngay-black-friday-nhat-dinh-ban-phai-biet-59.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/photo-0-1479870997630.jpg" alt="Top 7 sự thật về ngày Black Friday nhất định bạn phải biết">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-khuyen-mai/top-7-su-that-ve-ngay-black-friday-nhat-dinh-ban-phai-biet-59.top" title="Top 7 sự thật về ngày Black Friday nhất định bạn phải biết">Top 7 sự thật về ngày Black Friday nhất định bạn phải biết</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-khuyen-mai">Khuyến mại</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 15:36:00</span>
                        </div>
                        <p>Mỗi năm, có rất nhiều người bị chen lấn xô đẩy, hoặc thậm chí bị thương vì... Black Friday. Do đó, bạn cần phải suy nghĩ kỹ trước khi quyết định lao vào “cuộc chiến”. Nếu bạn đang khao khát sở hữu một món đồ nào đó mà chưa tích đủ tiền thì Black Friday sẽ là cơ hội cực tốt đối với bạn.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-khuyen-mai/top-cac-canh-tuong-ngay-black-friday-khien-ca-the-gioi-choang-vang-58.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/source-1479963412441.gif" alt="Top các cảnh tượng ngày Black Friday khiến cả thế giới choáng váng">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-khuyen-mai/top-cac-canh-tuong-ngay-black-friday-khien-ca-the-gioi-choang-vang-58.top" title="Top các cảnh tượng ngày Black Friday khiến cả thế giới choáng váng">Top các cảnh tượng ngày Black Friday khiến cả thế giới choáng váng</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-khuyen-mai">Khuyến mại</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 15:29:08</span>
                        </div>
                        <p>Người ta sẵn sàng giẫm đạp lên nhau để mua được món đồ yêu thích, hoặc chỉ vì nó rẻ bất ngờ. Black Friday, hay còn gọi là ngày "Thứ Sáu đen tối", là ngày vàng mua sắm dành cho tất cả mọi người. Khi nhắc đến Black Friday, người ta sẽ nghĩ ngay đến hai điều "siêu giảm giá" và "đám đông hỗn loạn". </p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/top-khuyen-mai/khuyen-mai-gigabyte-tang-gau-khi-mua-bo-mach-chu-57.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/gigabyte-tang-gau-04-1482212327473-crop-1482212448185.jpg" alt="Khuyến mại Gigabyte  tặng gấu khi mua bo mạch chủ">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/top-khuyen-mai/khuyen-mai-gigabyte-tang-gau-khi-mua-bo-mach-chu-57.top" title="Khuyến mại Gigabyte  tặng gấu khi mua bo mạch chủ">Khuyến mại Gigabyte  tặng gấu khi mua bo mạch chủ</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/top-khuyen-mai">Khuyến mại</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-20 15:18:30</span>
                        </div>
                        <p>Nhân dịp lễ giáng sinh, rất nhiều thương hiệu phần cứng thực hiện các chương trình khuyến mại ý nghĩa dành cho người dùng. GIGABYTE - nhà sản xuất bo mạch chủ và card đồ họa hàng đầu thế giới kết hợp với nhà phân phối Viễn Sơn và Thủy Linh giới thiệu chương trình khuyến mãi dành cho người tiêu dùng mang tên “Mùa đông không lạnh khi có GIGABYTE bên cạnh”.</p>
                    </div>
                </article>
                <article class="aNewLastest">
                    <a class="imgThumb" href="https://top5l.com/tu-vi/sao-thai-duong-va-y-nghia-trong-tu-vi-19.top"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/soha-game-game-soc-vui-sao-thai-duong.png" alt="Sao Thái Dương và ý nghĩa trong tử vi">
                    </a>
                    <div class="aNewLastestInfo">
                        <h3 class="rs"><a href="https://top5l.com/tu-vi/sao-thai-duong-va-y-nghia-trong-tu-vi-19.top" title="Sao Thái Dương và ý nghĩa trong tử vi">Sao Thái Dương và ý nghĩa trong tử vi</a></h3>
                        <div class="nameCat"><a href="https://top5l.com/tu-vi">Tử vi</a><span class="nameCatSpace">-</span><span class="nameCatTime">2016-12-19 10:57:26</span>
                        </div>
                        <p>Thái Dương vốn là mặt trời, đóng ở các cung ban ngày (từ Dần đến Ngọ) thì rất hợp vị, có môi trường để phát huy ánh sáng. Đóng ở cung ban đêm (từ Thân đến Tý) thì u tối, cần có Tuần, Triệt, Thiên Không, Thiên Tài mới sáng.</p>
                    </div>
                </article>
            </div>
            <!--//newLastest-->
            <div class="spaceBig"></div>
        </div>
        <div class="mainRight">
            <div class="advbanner adv2 mb">
                <a href="http://ho.lazada.vn/SHLuBE?file_id=149537" target="_blank"><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/6947_VNHATetcampaign-KangarooBuy1get1free11.jpg" width="300" height="600" border="0">
                </a><img src="./Top 10 điều nên biết để tắm sao tốt cho sức khỏe _ Top5L_files/aff_i(1)" width="1" height="1" style="position:fixed;top: -9999px;">
            </div>
        </div>
    </div>
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