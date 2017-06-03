<?php

namespace App\Http\Controllers;

use App\Http\Model\Category;
use App\Http\Model\Post;
use App\Http\Model\PostTag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Model\SConfigs;
use Illuminate\Support\Facades\Input;
use Goutte\Client;
use Illuminate\Support\Facades\Validator;
use Schema,DB,Response;
//require_once(app_path().'\simple_html_dom.php');
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->cats('nuoc-lavie');
    }

    //--FUNCTION render VIEW for POST
    /**
     * @param $categoryAlias
     * @param $Postalias
     *
     * @return View
     */
    public function posts($categoryAlias,$Postalias){

        $category = Category::findByName($categoryAlias,['name','id','description']);
        if($category==null){
            abort('404','post not found');
        }
        $post = Post::where('category_id',$category->id)->where('slug',$Postalias)->first();
        if($post==null){
            abort('404','post not found');
        }
        $tags = PostTag::gettagsinpost($post->id);
        $posts = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
            ->join('categories','categories.id','=','blog_posts.category_id')
            ->where('category_id',$category->id)
            ->where('blog_posts.type','post')
            ->limit(10)->orderBy('id','DESC')->where('blog_posts.id','<>',$post->id)->get();
        $featured_posts = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
            ->join('categories','categories.id','=','blog_posts.category_id')
            ->where('blog_posts.status','publish')
            ->where('blog_posts.featured','=',1)
            ->where('blog_posts.type','=','post')
            ->orderBy('blog_posts.id','DESC')
            ->limit(5)
            ->get();
        return view('frontend/nuockhoang365/layouts/post_base',['post'=>$post,'tags'=>$tags,'category'=>$category,'posts'=>$posts,'featured_posts'=>$featured_posts]);
    }

    /**
     * @param $catSlug
     *
     * @return View
     */
    public function cats($catSlug){
        $params = [];
        $cdbCategory = Category::findByName($catSlug);
        if($cdbCategory==null){
            abort('404','category not found');
        }
        $params['posts'] = Post::select('id','title','created_at','slug','description','summary','image')
            ->where('category_id',$cdbCategory->id)
            ->where('status','publish')
            ->where('type','product')
            ->where('featured','<>',1)
            ->orderBy('id','DESC')
            ->limit(19)
            ->get();
        $params['featured_posts'] = Post::select('id','title','created_at','slug','description','summary','image')
            ->where('category_id',$cdbCategory->id)
            ->where('status','publish')
            ->where('type','product')
            ->where('featured','=',1)
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();
        return view('frontend/nuockhoang365/layouts/home_base',['params'=>$params,'category'=>$cdbCategory]);
    }

    /**
     * @param null $keywords
     *
     * @return View
     */
    public function search($keywords=null){
        $search = Input::get('keywords',$keywords);
        $params['posts'] = Post::select('id','title','created_at','slug','description','summary','image')
            ->where('title','like',"%".$search."%")
            ->orWhere('description','like',"%".$search."%")
            ->orderBy('title','asc')
            ->get();
        return view('frontend/cms/layouts/search_base',['posts'=>$params['posts']]);
    }

    /**
     *
     */
    public function crawl(){
        //lay danh sách truyện
        //---------------------///
        //self::danhsachtruyen();
        //--------------------//

        //craw từng truyện
        return view('frontend/cms/layouts/crawl_base');
    }

    protected static function danhsachtruyen(){

//        if(Schema::hasTable('m_list')==false){
//            Schema::create('m_list',function($table){
//                $table->increments('id');
//                $table->string('title')->nullable();
//                $table->integer('cat_id')->nullable();
//                $table->string('link_crawl')->nullable();
//                $table->integer('last_chapter')->nullable();
//                $table->string('json_params')->nullable();
//                $table->timestamps();
//            });
//        }
//        $html = file_get_html('http://truyentranhtuan.com/danh-sach-truyen');
//        $a = $html->find('span[class=manga] a');
//        $listTruyen = [];
//        foreach($a as $row){
//            $listTruyen[] = ['title'=>$row->plaintext,'link_crawl'=>$row->href];
//
//        }
//        dd($listTruyen);
//        foreach($listTruyen as $key=>$row){
//            $v = Validator::make($row,[
//                'title'=>'unique:m_list',
//                'link_crawl'=>'unique:m_list'
//            ]);
//            if($v->passes()==false){
//                unset($listTruyen[$key]);
//            }
//        }
//        dd($listTruyen);
//        $c = DB::table('m_list')->insert($listTruyen);
//        dump($c);
    }
    protected static function listchapter(){
        $manga = DB::table('m_list')->where('id',Input::get('id'))->first();
        $link = $manga->link_crawl;

        $html = file_get_html($link);
        $a = $html->find('span[class=chapter-name] a');
        $listTruyen = [];
        foreach($a as $row){
            $listTruyen[] = ['title'=>$row->plaintext,'link_crawl'=>$row->href,'m_id'=>$manga->id];
        }
        $lastChapter = count($listTruyen);
        if($lastChapter!=$manga->last_chapter){
            // nếu có chương mới
            DB::table('m_list')->where('id',$manga->id)->update([
                'last_chapter'=>$lastChapter
            ]);

        }else{
            $cdbListTruyen = DB::table('c_list')->where('m_id',$manga->id)->get();
        }
        return Response::json($listTruyen);

    }
    public function page($slug){
        $params = [];
        $slug = str_replace(".html","",$slug);
        $page = \DB::table('pages')->where('slug',$slug)->first();
        return view('frontend/nuockhoang365/layouts/page_base',['page'=>$page]);
    }

    public function getSocialRedirect($provider='google')
    {
        //return \SView::render('admin.auth.index');
        return Socialite::driver( $provider )->redirect();
    }

    public function getSocialHandle( $provider='google' )
    {
        $o_googleuser = Socialite::driver( $provider )->user();
        if(is_object($o_googleuser)){
            $o_userVCCmail = $o_googleuser->email;
            $cdb_user = User::where('email',$o_userVCCmail)->first();
            if(count($cdb_user)>0){
                $this->loginUser($cdb_user);
                if(\Auth::check()){
                    return \Redirect::to('/admin');
                }else{
                    echo 'chua login duoc';
                }


            }else{
                echo "User khong duoc phep! please login with VCORP's email : example (xxx@vccorp.vn)\n";
                echo "Click here to login to admin : <a href='/admin'>login</a>";
            }
        }else{
            echo 'Authen failed!';
        }

    }

    private function loginUser($o_user){
        Auth::login($o_user);
    }
}
