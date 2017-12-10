<section class="fixCen" id="content">
    <div class="showProduct">
        @if(isset($params['featured_posts']))
            @foreach($params['featured_posts'] as $post)
                <?php
                $json_params = json_decode($post->json_params);
                //                dump($json_params->price);die;
                $price = (isset($json_params->price) ? $json_params->price : 0);

                $period = explode("/", $price);$period = isset($period[1]) ? $period[1] : "bình";
                $price = explode(" ", $price); $price = isset($price[0]) ? $price[0] : 0;
                ?>
                <div class="product">
                    <div class="image" style="background-image: url({{$post->image}})">
                        <img src="{{$post->image}}"
                             alt="{{$post->title}}" width="470" height="470">
                    </div>
                    <h2>{{$post->title}}</h2>
                    <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup
                                class="period">/{{$period}}</sup></div>
                    <div class="hr_color"></div>
                    <div class="subtitle">{{$post->summary}}</div>
                </div>
            @endforeach
        @endif
    </div>

    @if(isset($params['categories']))
        <?php $params['categories'] = ($params['categories'])->sortBy('id'); ?>
        @foreach($params['categories'] as $key=>$cat)
            <h2 class="pk-title"><i></i><span>{{$cat->name}}</span><i></i></h2>
            @if(isset($cat->mota))
            <div class="intro intro{{$key}}">
                <div class="left"> <img src="{!! $cat->image !!}" title="" alt=""></div>
                <div class="center">
                    {!! $cat->mota !!}
                </div>
                <div class="right">
                    <img src="{!! $cat->image2 !!}" title="" alt="">
                </div>
            </div>
            @endif
            <div class="show-equiment">
                @if(isset($cat->posts))
                    @foreach($cat->posts as $post)
                        @if($post->type=='product')
                            <?php
                            $json_params = json_decode($post->json_params);
                            //                dump($json_params->price);die;
                            $price = (isset($json_params->price) ? $json_params->price : 0);

                            $period = explode("/", $price);$period = isset($period[1]) ? $period[1] : "bình";
                            $price = explode(" ", $price); $price = isset($price[0]) ? $price[0] : 0;

                            ?>
                            <div class="product">
                                <div class="image" style="background-image: url({{$post->image}})">
                                    <img src="{{$post->image}}" alt="{{$post->title}}" width="488" height="488">
                                </div>
                                <h2>{{$post->title}}</h2>
                                <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup
                                            class="period">/ {{$period}}</sup>
                                </div>
                                <div class="hr_color"></div>
                                <div class="subtitle">{{$post->summary}}</div>
                            </div>
                            {{--<article class="aNewCatMiniBig">--}}
                            {{--<a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}" class="imgThumb"><img src="{{$post->image}}" alt="{{$post->title}}"></a>--}}
                            {{--<h3 class="rs"><a href="{{URL::to('/').'/'.$cat->slug.'/'.$post->slug}}">{{$post->description}}</a></h3>--}}
                            {{--</article>--}}
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    @endif
    @if(isset($params['phu-kien']))
        <h2 class="pk-title"><i></i><span>Phụ kiện</span><i></i></h2>
        <div class="show-equiment">
            @if(isset($params['phu-kien']->products))
                @foreach($params['phu-kien']->products as $key=>$value)
                    <?php
                    $json_params = json_decode($value->json_params);
                    //                dump($json_params->price);die;
                    $price = (isset($json_params->price) ? $json_params->price : 0);

                    $period = explode("/", $price);$period = isset($period[1]) ? $period[1] : "bình";
                    $price = explode(" ", $price); $price = isset($price[0]) ? $price[0] : 0;

                    ?>
                    <div class="product">
                        <div class="image" style="background-image: url({{$value->image}})">
                            <img src="{{$value->image}}" alt="{{$value->title}}"
                                 width="488" height="488">
                        </div>
                        <h2>{{$value->title}}</h2>
                        <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup
                                    class="period">/ {{$period}}</sup>
                        </div>
                        <div class="hr_color"></div>
                        <div class="subtitle">{{$value->summary}}</div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</section>
