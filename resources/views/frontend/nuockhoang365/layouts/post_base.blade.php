@extends(VIEW_FRONT.'.layouts.base')
@section('content')
    <section class="fixCen news-body" id="content">
        <div class="news-content news-detail-content">
            <h2 class="entry-title" itemprop="headline">{{$post->title}}</h2>
            <div class="the_content_wrapper">
                {!! $post->content !!}
            </div>
        </div>
        <div class="hot-line-right">
            <span>Gọi nước nhanh</span>
            <blueBig>(08) 73000173</blueBig>
            <div class="hr"></div>
            Giờ giao hàng <br>
            <strong>Từ 8:00 đến 17:00</strong>
        </div>
    </section>
    @include('frontend.nuockhoang365.ViewComposers.FooterAll')
@endsection