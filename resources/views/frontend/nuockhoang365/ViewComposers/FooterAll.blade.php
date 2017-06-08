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
                <li class="list_idea">Giao miễn phí lên tầng 3.</li>
                <li class="list_check">Giá bán không bao gồm các phụ phí khác (phí giữ xe, thang máy,...)</li>
            </ul>
        </div>
        <div class="company">
            <h4>Đơn vị chủ quản</h4>
            <div class="textwidget"><h4 class="title"></h4>
                <p><strong>CÔNG TY CT TNHH DVTM TỔNG HỢP HỒNG HÀ</strong></p>
                <p>
                    Nhà phân phối La Vie cấp 1<br>
                    Mã Số Doanh Nghiệp 0107785544 <br>Nơi cấp: Sở KH-ĐT TP.Hà Nội<br>74A ngõ 295 phố bạch mai quận HBT tp HN
                    <br>Điện thoại : 0979332708-0962632231
                </p>
            </div>
        </div>
        <div class="gg-map">
            <h4 class="title">Kho Hàng</h4>
            <p>74A ngõ 295 phố bạch mai quận HBT tp HN<br>Điện thoại : 0962632231</p>
            <p>Kho 2 số 32 ngõ 192 lê trọng tấn- thanh xuân hà nội<br>Điện thoại : 0979332708</p>
            <p>Kho 3 102 d7 thành công -  ba đình hà nội<br>Điện thoại : 0962632231</p>
            <p>Kho 4 150 tây sơn - đống đa hà nội<br>Điện thoại : 0979332708</p>
            <p>28 đường yên phụ đôi - tây hồ hà nội<br>Điện thoại : 0962632231</p>
            <p>Kho 6 123 tân mai mới hoàng mai hà nội<br>Điện thoại : 0979332708.</p>

        </div>
    </div>
</footer>