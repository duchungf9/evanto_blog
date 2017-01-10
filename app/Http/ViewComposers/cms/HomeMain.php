<?php

namespace App\Http\ViewComposers\Cms;

use App\Http\Model\Category;
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
        $params['posts'] = Post::select('blog_posts.id','blog_posts.title','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id')
            ->join('categories','categories.id','=','blog_posts.id')
            ->where('blog_posts.status','publish')
            ->where('blog_posts.featured','<>',1)
            ->orderBy('blog_posts.id','DESC')
            ->limit(19)
            ->get();
        $params['featured_posts'] = Post::select('blog_posts.id','blog_posts.title','blog_posts.slug','blog_posts.description','blog_posts.summary','blog_posts.image','categories.name','categories.id as cat_id')
            ->join('categories','categories.id','=','blog_posts.id')
            ->where('blog_posts.status','publish')
            ->where('blog_posts.featured','=',1)
            ->orderBy('blog_posts.id','DESC')
            ->limit(3)
            ->get();
        $params['categories'] = Category::select('id','name')->orderByRaw("RAND()")->limit(10)->get();
        foreach($params['categories'] as $cat){
            $post = Post::where('category_id',$cat->id)->orderBy('id','DESC')->limit(3)->get();
            $cat->posts = $post;
        }
        $view->with('params', $params);
    }
}