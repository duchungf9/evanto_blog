@extends(VIEW_FRONT.'.layouts.base')
@section('content')
    <section class="fixCen" id="content">
        <div class="km-content">
            <h2 class="long-title">{{$page->title}}</h2> <br>
            {!! $page->content !!}
        </div>
    </section>
    @include('frontend.nuockhoang365.ViewComposers.FooterAll')
@endsection