<ul class="main-nav rs">
    @if(isset($menus))
        @foreach($menus as $key=>$menu)
            <li><a href="{{URL::to('/')}}/{{$menu->slug}}" title="{{$menu->name}}">{{\Illuminate\Support\Str::upper($menu->name)}}</a></li>
        @endforeach
    @endif
    {{--@if(isset($menus->pages))--}}
        {{--@foreach($menus->pages as $page)--}}
                {{--<li><a href="{{URL::to('/').'/p/'.$page->slug}}.html" title="{{$page->title}}">{{\Illuminate\Support\Str::words($page->title,3)}}</a></li>--}}
        {{--@endforeach--}}
    {{--@endif--}}
    {{--<li class="active"><a href="/" title="LaVie">LaVie</a></li>--}}
    {{--<li><a href="/" title="Nước tinh khiết Miru">Miru</a></li>--}}
    {{--<li><a href="/" title="Nước tinh khiết Aquafina">AquaFina</a></li>--}}
    <li><a href="{{URL::to('/')}}/tin-tuc.html" title="Tin tức">TIN TỨC</a></li>
</ul>