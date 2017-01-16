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
        $posts = Post::where('category_id',$category->id)->limit(10)->orderBy('id','DESC')->where('id','<>',$post->id)->get();
        return view('frontend/cms/layouts/post_base',['post'=>$post,'tags'=>$tags,'category'=>$category,'posts'=>$posts]);
    }
}
