@extends(VIEW_FRONT.'.layouts.base')
@section('content')
    <section class="fixCen news-body" id="content">
        <div class="news-content">
            @if(isset($params['posts']))
                @foreach($params['posts'] as $key=>$post)
                    <div class="post pr">
                        <a href="{{URL::to('/')}}/{{$category->slug}}/{{$post->slug}}" title="{{$post->title}}">
                            <img src="{{$post->image}}" alt="{{$post->title}}"></a>
                        <div class="title">
                            <a href="{{URL::to('/')}}/{{$category->slug}}/{{$post->slug}}" title="{{$post->title}}">{{$post->title}}</a>
                        </div>
                        <div class="date">{{$post->created_at}}</div>
                        <div class="summary">{{$post->summary}}</div>
                        <div class="content-hide">
                            <a class="view-detail" href="{{URL::to('/')}}/{{$category->slug}}/{{$post->slug}}" title="{{$post->title}}">CHI TIẾT</a>
                        </div>
                    </div>
                @endforeach
            @endif

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