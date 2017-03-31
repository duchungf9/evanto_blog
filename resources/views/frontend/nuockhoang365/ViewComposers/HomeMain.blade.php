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
</div>
    <h2 class="pk-title"><i></i><span>Phụ kiện LaVie</span><i></i></h2>
    <div class="show-equiment">
        @if(isset($params['phu-kien']))
            @if(isset($params['phu-kien']->products))
                @foreach($params['phu-kien']->products as $key=>$value)
                    <?php
                    $json_params = json_decode($value->json_params);
                    //                dump($json_params->price);die;
                    $price = (isset($json_params->price)?$json_params->price:0);

                    $period = explode("/",$price);$period = isset($period[1])?$period[1]:"bình";
                    $price = explode(" ",$price); $price = isset($price[0])?$price[0]:0;

                    ?>
                    <div class="product">
                        <div class="image">
                            <img src="{{$value->image}}" alt="{{$value->title}}"
                                 width="488" height="488">
                        </div>
                        <h2>{{$value->title}}</h2>
                        <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup class="period">/ {{$period}}</sup>
                        </div>
                        <div class="hr_color"></div>
                        <div class="subtitle">{{$value->summary}}</div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</section>
