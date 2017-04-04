<?php

namespace App\Http\ViewComposers\Nuockhoang365;

use App\Http\Model\Category;
use App\Http\Model\SConfigs;
use App\Http\Model\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use DB,Cache;
class HomeMain
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categorySLug = null;
        if(isset($_SERVER['REDIRECT_URL']) or isset($_SERVER['REQUEST_URI'])){
            $href = (isset($_SERVER['REDIRECT_URL']))?$_SERVER['REDIRECT_URL']:$_SERVER['REQUEST_URI'];
            $categorySLug = str_replace("/","",$href);
            $categorySLug = str_replace("/","",$href);
            $category = Category::where('slug',$categorySLug)->first();
        }
        if(!isset($category)){
            $params = [];
            //$params['featured_posts'] = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','blog_posts.json_params','categories.name','categories.id as cat_id','categories.slug as cat_slug')
            //                                ->join('categories','categories.id','=','blog_posts.category_id')
            //                                ->where('blog_posts.status','publish')
            //                                ->where('blog_posts.featured','=',1)
            //                                ->where('blog_posts.type','=','product')
            //                                ->orderBy('blog_posts.id','DESC')
            //                                ->get();
            $menu = SConfigs::where('key','app.menu')->first();
            if(!$menu){$menu=[];}else{$menu=unserialize($menu->value);}
            $params['categories'] = Category::orderByRaw("RAND()")->whereIn('id',$menu)->limit(10)->get();
            foreach($params['categories'] as $cat){
                $cat->posts = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.json_params','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
                                  ->join('categories','categories.id','=','blog_posts.category_id')
                                  ->where('blog_posts.category_id',$cat->id)
                                  ->where('blog_posts.type','product')
                                  ->orderBy('blog_posts.id','DESC')->get();
            }
            $view->with('params', $params);
        }else{
            $params = [];
            $params['featured_posts'] = Post::select('id','title','created_at','slug','description','summary','image','json_params')
                                            ->where('status','publish')
                                            ->where('category_id',$category->id)
                                            ->where('featured','=',1)
                                            ->where('type','=','product')
                                            ->orderBy('id','ASC')
                //->limit(4)
                                            ->get();
            $params['category'] = $category;
            $catPhukien = Category::where('slug','phu-kien')->first();
            if($catPhukien==null){
                $catPhukien = new Category();
                $catPhukien->name = "Phụ Kiện";
                $catPhukien->slug = "phu-kien";
                $catPhukien->description = "Phụ Kiện";
                $catPhukien->save();
            }
            $catPhukien->products = Post::where('category_id',$catPhukien->id)->where('status','publish')->orderBy('id','ASC')->get();
            $params['phu-kien'] = $catPhukien;
            $view->with('params', $params);
        }

    }
}