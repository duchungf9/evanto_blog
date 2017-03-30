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
    {{--<title>LavieWater | Trang chủ</title>--}}

    {{--<meta property="og:title" content="Tiêu đề site hoặc tên bài viết">--}}
    {{--<meta property="og:description" content="Mô tả site hoặc tóm tắt bài viết">--}}
    {{--<meta property="og:type" content="website">--}}
    {{--<meta property="og:url" content="Đường dẫn hiện tại">--}}
    {{--<meta property="og:image" content="Đường dẫn ảnh logo hoặc ảnh bài viết">--}}
    {{--<meta property="og:site_name" content="Tên website">--}}

    {{--<meta name="twitter:card" content="Card">--}}
    {{--<meta name="twitter:url" content="Đường dẫn hiện tại">--}}
    {{--<meta name="twitter:title" content="Tiêu đề site hoặc tên bài viết">--}}
    {{--<meta name="twitter:description" content="Mô tả site hoặc tóm tắt bài viết">--}}
    {{--<meta name="twitter:image" content="Đường dẫn ảnh logo hoặc ảnh bài viết">--}}

    {{--<meta itemprop="name" content="Tiêu đề site hoặc tên bài viết">--}}
    {{--<meta itemprop="description" content="Mô tả site hoặc tóm tắt bài viết">--}}
    {{--<meta itemprop="image" content="Đường dẫn ảnh logo hoặc ảnh bài viết">--}}

    {{--<meta name="ABSTRACT" content="Mô tả site"/>--}}
    {{--<meta http-equiv="REFRESH" content="1200"/>--}}
    {{--<meta name="REVISIT-AFTER" content="1 DAYS"/>--}}
    {{--<meta name="DESCRIPTION" content="Mô tả site hoặc tóm tắt bài viết"/>--}}
    {{--<meta name="KEYWORDS" content="Từ khóa"/>--}}
    {{--<meta name="ROBOTS" content="index,follow"/>--}}
    {{--<meta name="AUTHOR" content="Tên website"/>--}}
    {{--<meta name="RESOURCE-TYPE" content="DOCUMENT"/>--}}
    {{--<meta name="DISTRIBUTION" content="GLOBAL"/>--}}
    {{--<meta name="COPYRIGHT" content="Copyright 2013 by Goethe"/>--}}
    {{--<meta name="Googlebot" content="index,follow,archive"/>--}}
    {{--<meta name="RATING" content="GENERAL"/>--}}
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
                    <a href="tel:19008198" class="hotline-top" title="Gọi ngay hotline">(082)73.0000.173</a>
                </h1>
                @include('frontend.nuockhoang3d65.ViewComposers.HeaderAll')
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
    <section class="fixCen" id="content">
        <div class="showProduct">
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/08/nuoc-khoang-lavie-1.png"
                         alt="Bình La Vie 19 Lít" width="470" height="470">
                </div>
                <h2>Bình 19 Lít</h2>
                <div class="price"><span>55,000</span><sup class="currency">đ</sup><sup class="period">/bình</sup></div>
                <div class="hr_color"></div>
                <div class="subtitle">Bình La Vie 19 Lít thích hợp dùng cho văn phòng, hộ gia đình</div>
            </div>
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/08/gia-thung-nuoc-lavie-chai-nho.png"
                         alt="nước lavie 350ml" width="488" height="488">
                </div>
                <h2>Thùng 350ml</h2>
                <div class="price"><span>80,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">24 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>
            </div>
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-500ml.png" alt="La Vie 500ml"
                         width="488" height="488">
                </div>
                <h2>Thùng 500ml</h2>
                <div class="price"><span>90,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">24 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>
            </div>
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-1.5l.png" alt="La Vie 1,5 Lít"
                         width="488" height="488">
                </div>
                <h2>Thùng 1,5 Lít</h2>
                <div class="price"><span>95,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">12 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>
            </div>
        </div>
        <h2 class="pk-title"><i></i><span>Phụ kiện LaVie</span><i></i></h2>
        <div class="show-equiment">
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-binh-up.png" alt="Bình Nhựa La Vie"
                         width="488" height="488">
                </div>
                <h2>Bình Đựng Nước La Vie</h2>
                <div class="price"><span>320,000</span><sup class="currency">đ</sup><sup class="period">/ cái</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">Dùng để úp bình La Vie 19 Lít</div>
            </div>
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-chan-inox.png" alt="Kệ Inox La Vie"
                         width="488" height="488">
                </div>
                <h2>Chân Kệ Inox</h2>
                <div class="price"><span>150,000</span><sup class="currency">đ</sup><sup class="period">/ cái</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">Dùng cho bình La Vie 19 lít</div>
            </div>
            <div class="product">
                <div class="image">
                    <img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-nong-lanh.png"
                         alt="Máy nóng lạnh La Vie" width="488" height="488">
                </div>
                <h2>Máy Nóng Lạnh La Vie</h2>
                <div class="price"><span>3,580,000</span><sup class="currency">đ</sup><sup class="period">/ cái</sup>
                </div>
                <div class="hr_color"></div>
                <div class="subtitle">Dùng cho bình La Vie 19 lít</div>
            </div>
        </div>
    </section>
    <footer>
        <div class="fixCen">
            <div class="info-for-cus">
                <h4>Người tiêu dùng</h4>
                <div class="recent_posts">
                    <ul>
                        <li class="post">
                            <a href="chi-tiet.html">
                                <div class="desc"><h6>Giá nước La Vie hiện nay phù hợp với tầng lớp người tiêu dùng nào</h6>
                                    <span class="date"><i class="icon-clock"></i>18/08/2016</span>
                                </div>
                                <div class="photo">
                                    <img width="80" height="80" src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-binh-up.png" alt="Bình Nhựa La Vie">
                                </div>
                            </a>
                        </li>
                        <li class="post">
                            <a href="chi-tiet.html">
                                <div class="desc"><h6>Giá nước La Vie hiện nay phù hợp với tầng lớp người tiêu dùng nào</h6>
                                    <span class="date"><i class="icon-clock"></i>18/08/2016</span>
                                </div>
                                <div class="photo">
                                    <img width="80" height="80" src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-binh-up.png" alt="Bình Nhựa La Vie">
                                </div>
                            </a>
                        </li>
                        <li class="post">
                            <a href="chi-tiet.html">
                                <div class="desc">
                                    <h6>Giá nước La Vie hiện nay phù hợp với tầng lớp người tiêu dùng nào</h6>
                                    <span class="date"><i class="icon-clock"></i>18/08/2016</span>
                                </div>
                                <div class="photo">
                                    <img width="80" height="80" src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-binh-up.png" alt="Bình Nhựa La Vie">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="delivery">
                <h4>Chính sách giao hàng</h4>
                <ul class="list_mixed">Giao hàng tận nơi, miễn phí.
                    <li class="list_star">Giao hàng theo giờ hẹn linh hoạt.</li>
                    <li class="list_idea">Giao miễn phí lên lầu 1.</li>
                    <li class="list_check">Giá bán không bao gồm các phụ phí khác (phí giữ xe, thang máy,...)</li>
                </ul>
            </div>
            <div class="company">
                <h4>Đơn vị chủ quản</h4>
                <div class="textwidget"><h4 class="title"></h4>
                    <p><strong>CÔNG TY TNHH TVĐT TMDV THIÊN AN</strong></p>
                    <p>
                        Nhà phân phối La Vie cấp 1<br>
                        Mã số NPP: C0013140<br>
                        Mã Số Doanh Nghiệp 0312760479 <br>Nơi cấp: Sở KH-ĐT TP.Hồ Chí Minh <br>183C/3C Tôn Thất Thuyết, P.4, Q.4, TP. HCM<br>Điện thoại : (08) 73.000.173
                    </p>
                    <h4 class="title">Kho Hàng</h4>
                    <p>196 Tôn Thất Thuyết, P.3, Q.4, TP. HCM<br>
                        Điện thoại : 0906.222.127</p>
                </div>
            </div>
            <div class="gg-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.7655984146973!2d106.70024799942932!3d10.752540164656551!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xafbb24d32c88e6d4!2zTsaw4bubYyBraG_DoW5nIExhVmllIEdpYW8gVOG6rW4gTsahaQ!5e0!3m2!1svi!2s!4v1481423892356" width="400" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </footer>
    <div class="hot-line-bottom px">
        <span>Hotline: </span> <a href="tel:0873000173">(08)73.000.173</a>
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
</body>
</html>
