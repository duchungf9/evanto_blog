<?php

namespace App\Http\ViewComposers\Cms;

use App\Http\Model\Category;
use App\Http\Model\SConfigs;
use App\Http\Model\Post;
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
        $params = [];
        $params['posts'] = Post::select('blog_posts.id','blog_posts.type','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id','categories.slug as cat_slug')
            ->join('categories','categories.id','=','blog_posts.category_id')
            ->where('blog_posts.status','publish')
            ->where('blog_posts.featured','<>',1)
            ->where('blog_posts.type','=','post')
            ->orderBy('blog_posts.id','DESC')
            ->limit(19)
            ->get();
        $params['featured_posts'] = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
            ->join('categories','categories.id','=','blog_posts.category_id')
            ->where('blog_posts.status','publish')
            ->where('blog_posts.featured','=',1)
            ->where('blog_posts.type','=','post')
            ->orderBy('blog_posts.id','DESC')
            ->limit(3)
            ->get();
        $menu = SConfigs::where('key','app.menu')->first();
        if(!$menu){$menu=[];}else{$menu=unserialize($menu->value);}
        $params['categories'] = Category::orderByRaw("RAND()")->whereIn('id',$menu)->limit(10)->get();
        foreach($params['categories'] as $cat){
            $cat->posts = Post::select('blog_posts.id','blog_posts.title','blog_posts.created_at','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id','categories.slug as cat_slug')
                ->join('categories','categories.id','=','blog_posts.category_id')
                ->where('blog_posts.category_id',$cat->id)->orderBy('id','DESC')->limit(3)->get();
        }
        $view->with('params', $params);
    }
}