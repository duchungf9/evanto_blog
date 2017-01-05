<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use App\Http\Model\Category;
use App\Http\Model\Post;
use Cache,Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = [];
        $infos['posts'] = Post::count();
        $infos['cats'] = Category::count();

        return view('admin/admin',['infos'=>$infos]);
    }

    public function slider(){
        $cacheSlider = Cache::get('slider_posts');
        if(Request::wantsJson() and Input::has('setslider')){
            $postId = Input::get('pid');
            if(in_array($postId,$cacheSlider)){
                $position = array_search($postId,$cacheSlider);
                unset($cacheSlider[$position]);
                Cache::forever('slider_posts',$cacheSlider);
                return 'ok_remove';
            }else{
                $cacheSlider[] = $postId;
                Cache::forever('slider_posts',$cacheSlider);
                return 'ok_add';
            }

        }
        if($cacheSlider==null){
            $cacheSlider = Post::select('id','title','slug','description')->where('status','publish')->orderBy('id','DESC')->take(10)->get();
            $arrayIdsCache = [];
            foreach($cacheSlider as $post){
                $arrayIdsCache[] = $post;
            }
            Cache::forever('slider_posts',$arrayIdsCache);
        }
        $idsExcerpt = [];
        foreach($cacheSlider as $post){
            $idsExcerpt[] = $post;
        }
        $cdbList = Post::select('id','title','slug','description')->whereNotIn('id',$idsExcerpt)->where('status','publish')->orderBy('id','DESC')->paginate(10);
        $cdbSlider = Post::select('id','title','slug','description')->whereIn('id',$idsExcerpt)->get();
        return view('admin.settings.slider',['list'=>$cdbList,'slider'=>$cdbSlider]);
    }

}
