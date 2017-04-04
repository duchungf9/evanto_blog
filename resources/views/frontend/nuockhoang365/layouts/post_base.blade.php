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
            <blueBig>0979332708-0962632231</blueBig>
            <div class="hr"></div>
            Giờ giao hàng <br>
            <strong>Từ 7:00 đến 20:00</strong>
        </div>
    </section>
    @include('frontend.nuockhoang365.ViewComposers.FooterAll')
@endsection