<ul class="main-nav rs">
    @if(isset($menus))
        @foreach($menus as $menu)
            <li><a href="{{URL::to('/')}}/{{$menu->slug}}" title="{{$menu->name}}">{{$menu->name}}</a></li>
        @endforeach
    @endif
    {{--<li class="active"><a href="/" title="LaVie">LaVie</a></li>--}}
    {{--<li><a href="/" title="Nước tinh khiết Miru">Miru</a></li>--}}
    {{--<li><a href="/" title="Nước tinh khiết Aquafina">AquaFina</a></li>--}}
    {{--<li><a href="khuyen-mai.html" title="Khuyến mại và tài trợ">Khuyến mại</a></li>--}}
    {{--<li><a href="tin-tuc.html" title="Tin tức">Tin tức</a></li>--}}
</ul>