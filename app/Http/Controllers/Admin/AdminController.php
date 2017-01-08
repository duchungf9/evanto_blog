<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\SConfigs;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Request;
use App\Http\Model\Category;
use App\Http\Model\Post;
use Cache,Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use DB;

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

    public function profile(){
        $cdbUser =  User::find(Auth::user()->id);
        if(Request::method()=='POST'){

            $aRules = ['email'=>'required|email|unique:users,id,'.Auth::user()->id,'name'=>'required','avatar'=>'mimes:jpeg,bmp,png'];
            $aInputs = Input::except('_token');
            $validator = \Validator::make($aInputs,$aRules);
            if($validator->passes()){

                $image = isset($aInputs['avatar'])?$aInputs['avatar']:"";
                if($image!=""){
                    $avatar = Self::uploadImage($image,Auth::user()->id,Auth::user()->id);
                    $aInputs['avatar']= $avatar;
                }
               $cdbUser->update($aInputs);
            }else{
                \Session::flash('flash_mes', $validator->errors()->all());
            }
        }
        \Session::flash('flash_mes', ['Success!']);
        \Session::flash('flash_ok', 1);

        $user = $cdbUser;
        return view('admin.settings.profile',['user'=>$user]);

    }
    public function site(){
        if(Schema::hasTable('blog_settings')==false){
            Schema::create('blog_settings', function($table) {
                $table->increments('id');
                $table->string('title', 255);
                $table->string('logo', 255);
                $table->string('favicon', 255);
            });
        }
        if(Request::method()=='POST'){

            $aInput  = Input::except('_token');
            foreach($aInput as $key=>$value){
                SConfigs::where('key',str_replace("_",".",$key))->update(['value'=>$value]);
            }
            \Session::flash('flash_mes', ['Success!']);
            \Session::flash('flash_ok', 1);
        }
        $getConfigs = DB::table('blog_settings')->where('id',1)->first();
        $site = [];
        if(count($getConfigs)>0){
            $site = $getConfigs;
        }
        $configs = SConfigs::where('state',1)->get();
        return view('admin.settings.site',['site'=>$site,'configs'=>$configs]);
    }
    public static function uploadImage($image,$prefix=null,$Id=null){
        if($Id!=null){
            $cdbUser = User::find($Id);
            $pathOldImageNeedDelete  = base_path() . '/public/images/users/u_'.$cdbUser->id.'_id/'.$cdbUser->avatar;
            \File::delete($pathOldImageNeedDelete);
        }
        $imageName = $prefix . '.' . $image->getClientOriginalExtension();
        $image->move(
            base_path() . '/public/images/users/u_'.$cdbUser->id.'_id/', $imageName
        );
        $result = '/images/users/u_'.$cdbUser->id.'_id/'.$imageName;
        return $result;
    }


}
