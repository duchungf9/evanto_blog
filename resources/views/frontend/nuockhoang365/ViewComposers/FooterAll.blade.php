<footer>
    <div class="fixCen">
        <div class="info-for-cus">
            <h4>Người tiêu dùng</h4>
            <div class="recent_posts">
                <ul>
                    @if(isset($params['posts']))
                        @foreach($params['posts'] as $key=>$post)
                            <li class="post">
                                <a href="{{URL::to('/').'/'.$post->cat_slug.'/'.$post->slug}}">
                                    <div class="desc"><h6>{{$post->title}}</h6>
                                        <span class="date"><i class="icon-clock"></i>{{$post->created_at}}</span>
                                    </div>
                                    <div class="photo">
                                        <img width="80" height="80" src="{{$post->image}}" alt="{{$post->title}}">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
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