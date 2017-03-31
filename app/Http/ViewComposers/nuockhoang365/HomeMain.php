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
        if(isset($_SERVER['REDIRECT_URL'])){
            $categorySLug = str_replace("/","",$_SERVER['REDIRECT_URL']);
            $categorySLug = str_replace("/","",$_SERVER['REDIRECT_URL']);
            $category = Category::where('slug',$categorySLug)->first();
        }
        if(!isset($category)){
            $category = Category::first();
        }
        $params = [];
        $params['featured_posts'] = Post::select('id','title','created_at','slug','description','summary','image','json_params')
            ->where('status','publish')
            ->where('category_id',$category->id)
            ->where('featured','=',1)
            ->where('type','=','product')
            ->orderBy('id','DESC')
            ->limit(4)
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
        $catPhukien->products = Post::where('category_id',$catPhukien->id)->where('status','publish')->orderBy('id','DESC')->limit(3)->get();
        $params['phu-kien'] = $catPhukien;
        $view->with('params', $params);
    }
}