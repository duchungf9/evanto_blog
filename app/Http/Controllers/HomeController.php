<?php

namespace App\Http\Controllers;

use App\Http\Model\Category;
use App\Http\Model\Post;
use App\Http\Model\PostTag;
use Illuminate\Http\Request;
use App\Http\Model\SConfigs;
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
        return view('frontend/cms/layouts/home_base');
    }

    //--FUNCTION render VIEW for POST
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
            ->where('category_id',$category->id)->limit(10)->orderBy('id','DESC')->where('blog_posts.id','<>',$post->id)->get();
        $featured_posts = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
                                        ->join('categories','categories.id','=','blog_posts.category_id')
                                        ->where('blog_posts.status','publish')
                                        ->where('blog_posts.featured','=',1)
                                        ->orderBy('blog_posts.id','DESC')
                                        ->limit(5)
                                        ->get();
        return view('frontend/cms/layouts/post_base',['post'=>$post,'tags'=>$tags,'category'=>$category,'posts'=>$posts,'featured_posts'=>$featured_posts]);
    }
}
