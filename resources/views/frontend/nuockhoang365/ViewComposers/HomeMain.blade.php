<section class="fixCen" id="content">
<div class="showProduct">
    @if(isset($params['featured_posts']))
        @foreach($params['featured_posts'] as $post)
            <?php
                $json_params = json_decode($post->json_params);
//                dump($json_params->price);die;
                $price = (isset($json_params->price)?$json_params->price:0);

                $period = explode("/",$price);$period = isset($period[1])?$period[1]:"bình";
                $price = explode(" ",$price); $price = isset($price[0])?$price[0]:0;

            ?>
            <div class="product">
                <div class="image">
                    <img src="{{$post->image}}"
                         alt="{{$post->title}}" width="470" height="470">
                </div>
                <h2>{{$post->title}}</h2>
                <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup class="period">/{{$period}}</sup></div>
                <div class="hr_color"></div>
                <div class="subtitle">{{$post->summary}}</div>
            </div>
        @endforeach
    @endif
    {{--<div class="product">--}}
        {{--<div class="image">--}}
            {{--<img src="http://laviewater.vn/wp-content/uploads/2016/08/gia-thung-nuoc-lavie-chai-nho.png"--}}
                 {{--alt="nước lavie 350ml" width="488" height="488">--}}
        {{--</div>--}}
        {{--<h2>Thùng 350ml</h2>--}}
        {{--<div class="price"><span>80,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>--}}
        {{--</div>--}}
        {{--<div class="hr_color"></div>--}}
        {{--<div class="subtitle">24 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>--}}
    {{--</div>--}}
    {{--<div class="product">--}}
        {{--<div class="image">--}}
            {{--<img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-500ml.png" alt="La Vie 500ml"--}}
                 {{--width="488" height="488">--}}
        {{--</div>--}}
        {{--<h2>Thùng 500ml</h2>--}}
        {{--<div class="price"><span>90,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>--}}
        {{--</div>--}}
        {{--<div class="hr_color"></div>--}}
        {{--<div class="subtitle">24 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>--}}
    {{--</div>--}}
    {{--<div class="product">--}}
        {{--<div class="image">--}}
            {{--<img src="http://laviewater.vn/wp-content/uploads/2016/11/Lavie-1.5l.png" alt="La Vie 1,5 Lít"--}}
                 {{--width="488" height="488">--}}
        {{--</div>--}}
        {{--<h2>Thùng 1,5 Lít</h2>--}}
        {{--<div class="price"><span>95,000</span><sup class="currency">đ</sup><sup class="period">/ thùng</sup>--}}
        {{--</div>--}}
        {{--<div class="hr_color"></div>--}}
        {{--<div class="subtitle">12 chai/thùng. Tiện lợi dùng cho hội họp, tổ chức sự kiện.</div>--}}
    {{--</div>--}}
</div>
@if(isset($params['categories']))
    @foreach($params['categories'] as $key=>$cat)
        <h2 class="pk-title"><i></i><span>{{$cat->name}}</span><i></i></h2>
                <div class="show-equiment">
                    @if(isset($cat->posts))
                        @foreach($cat->posts as $post)
                            <?php
                                $json_params = json_decode($post->json_params);
                                //                dump($json_params->price);die;
                                $price = (isset($json_params->price)?$json_params->price:0);

                                $period = explode("/",$price);$period = isset($period[1])?$period[1]:"bình";
                                $price = explode(" ",$price); $price = isset($price[0])?$price[0]:0;

                            ?>
                            <div class="product">
                                <div class="image">
                                    <img src="{{$post->image}}" alt="{{$post->title}}"
                                         width="488" height="488">
                                </div>
                                <h2>{{$post->title}}</h2>
                                <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup class="period">/ {{$period}}</sup>
                                </div>
                                <div class="hr_color"></div>
                                <div class="subtitle">{{$post->summary}}</div>
                            </div>
                        @endforeach
                    @endif

                </div>


    @endforeach
@endif
</section>
