<?php

namespace App\Http\ViewComposers\Nuockhoang365;

use App\Http\Model\Category;
use App\Http\Model\SConfigs;
use App\Http\Model\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use DB, Cache;

class HomeMain
{
    protected $fixCung = [
        'nuoc-lavie' => [
            'image' => 'http://nuockhoang24h.com/Pictures/Banner/lavie-banner.jpg',
            'description' => 'Với người tiêu dùng Việt Nam, nước khoáng LaVie đã trở nên vô cùng quen thuộc, có mặt khắp mọi nơi. LaVie được khai thác từ nguồn nước nhiên tinh khiết nhất, được bổ sung rất nhiều khoáng chất có lợi cho cơ thể trong cuộc sống năng động hàng ngày.
Lavie được đóng chai tại nguồn với công nghệ hiện đại của Nestlé Waters, không sử dụng hóa chất trong quy trình xử lý, có công bố chất lượng sản phẩm theo tiêu chuẩn Việt Nam.',
            'image2' => 'http://nuockhoang24h.com/Pictures/Banner/lavie-banner2.jpg',
        ],
        'nuoc-miru' => [
            'image' => 'http://nuockhoang24h.com/Pictures/Banner/Miru-banner-left.jpg',
            'description' => 'Nước tính khiết Miru sản phẩm của công ty TNHH nước giải khát Vạn Xuân.
Với dây chuyền sản xuất tự động khép kín, sản phẩm nước tinh khiết Miru luôn đảm bảo chất lượng ổn định từ sản phẩm đầu tiên đến sản phẩm cuối cùng. Tất cả bao bì nước uống Miru đều được thanh trùng trước khi đưa vào sản xuất.
Hệ thống KCS đang được áp dụng tại công ty chúng tôi theo chứng chỉ quản lý chất lượng ISO 9001:2000 và ISO 22000 Sản phẩm của chúng tôi đa dạng về chủng loại, kích cỡ phù hợp với mọi nhu cầu.',
            'image2' => 'http://nuockhoang24h.com/Pictures/Banner/Miru-banner-right.jpg',
        ],
        'nuoc-vinawa'=>[
            'image' => 'http://vinawa.com.vn/vnt_upload/product/11_2013/thumbs/160_crop__MG_6295_1.jpg',
            'description' => 'Nước uống tinh khiết Vinawa là một trong những dòng sản phẩm chất lượng cao của Tổng Công ty Thuốc lá Việt Nam - Vinataba, được sản xuất gia công tại Công ty CP Thương Mại Hàng Không Miền Nam - SATCOtrên dây chuyền sản xuất hiện đại như công nghệ thẩm thấu ngược, sử dụng màng lọc RO, xử lý nước bằng tia cực tím và Ozon công nghệ do hãng Waterman (Mỹ) chuyển giao.
 
Nước uống tinh khiết VINAWA, tuân thủ nghiêm ngặt theo tiêu chuẩn về công nghệ và chất lượng của cơ quan Quản lý Không gian, Hàng không quốc gia HOA KỲ - NASA.
 
Nước uống tinh khiết VINAWA đảm bảo chất lượng cao. Vì sức khỏe và sự hài lòng của Quý khách hàng chính là phương châm và động lực phát triển của Chúng tôi.',
            'image2' =>'http://vinawa.com.vn/vnt_upload/product/11_2013/thumbs/160_crop_MG_1643_resized_2.jpg'
        ]
    ];

    public function __construct()
    {
        // Dependencies automatically resolved by service container...

    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categorySLug = null;
        if (isset($_SERVER['REDIRECT_URL']) or isset($_SERVER['REQUEST_URI'])) {
            $href = (isset($_SERVER['REDIRECT_URL'])) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI'];
            $categorySLug = str_replace("/", "", $href);
            $categorySLug = str_replace("/", "", $href);
            $category = Category::where('slug', $categorySLug)->first();
        }
        if (!isset($category)) {
            $params = [];
            $menu = SConfigs::where('key', 'app.menu')->first();
            if (!$menu) {
                $menu = [];
            } else {
                $menu = unserialize($menu->value);
            }
            $params['categories'] = Category::orderBy('id', 'desc')->whereIn('id', $menu)->limit(10)->get();
            foreach($params['categories'] as $key=>$value)
            {
                foreach($this->fixCung as $key=>$valueX){
                    if($value->slug == $key){
                        $value->image = $valueX['image'];
                        $value->image2 = $valueX['image2'];
                        $value->mota = $valueX['description'];
                    }
                }

            }
            $view->with('params', $params);
        } else {
            $params = [];
            $params['featured_posts'] = Post::select('id', 'title', 'created_at', 'slug', 'description', 'summary', 'image', 'json_params')
                ->where('status', 'publish')
                ->where('category_id', $category->id)
                ->where('featured', '=', 1)
                ->where('type', '=', 'product')
                ->orderBy('id', 'ASC')
                ->get();
            $params['category'] = $category;
            $catPhukien = Category::where('slug', 'phu-kien')->first();
            if ($catPhukien == null) {
                $catPhukien = new Category();
                $catPhukien->name = "Phụ Kiện";
                $catPhukien->slug = "phu-kien";
                $catPhukien->description = "Phụ Kiện";
                $catPhukien->save();
            }
            $catPhukien->products = Post::where('category_id', $catPhukien->id)->where('status', 'publish')->orderBy('id', 'ASC')->get();
            $params['phu-kien'] = $catPhukien;
            $view->with('params', $params);
        }

    }
}