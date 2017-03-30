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
        return 'xxxx';die;
        return view(VIEW_FRONT.'.layouts.home_base');
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
            ->where('type','post')
            ->where('featured','<>',1)
            ->orderBy('id','DESC')
            ->limit(19)
            ->get();
        $params['featured_posts'] = Post::select('id','title','created_at','slug','description','summary','image')
            ->where('category_id',$cdbCategory->id)
            ->where('status','publish')
            ->where('type','post')
            ->where('featured','=',1)
            ->orderBy('id','DESC')
            ->limit(3)
            ->get();
        return view('frontend/nuockhoang365/layouts/category_base',['params'=>$params,'category'=>$cdbCategory]);
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
        $client = new Client();
        $crawler = $client->request('get','http://pets.vn/home/');
        $lastPage = $crawler->filter('.pages')->text();
        $lastPage = (str_replace('Page 1 of ','',$lastPage));
        $arrayPages = [];
        for($i=1;$i<=$lastPage;$i++){
            $crawler_pages = $client->request('get','http://pets.vn/home/page/'.$i);
            foreach($crawler_pages->filter(".item-details h3 a") as $href){
                $arrayPages[] = $href->getAttribute('href');
            }
        }

        dump($arrayPages);
    }
}
