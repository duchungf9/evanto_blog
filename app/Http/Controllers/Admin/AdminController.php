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
use App\Http\Lib\Common;
use Response;

class AdminController extends Controller
{
    private static $keysConfig = [
            'app.seo.title'=>'SEO title',
            'app.seo.description'=>'SEO Description',
            'app.seo.keywords'=>'seo, keywords',
            'app.seo.robots'=>'index,follow,archive',
            'app.seo.page_topic'=>'Page topic',
            'app.seo.fb_title'=>'SEO title on Facebook',
            'app.seo.fb_description'=>'SEO description on Facebook',
            'app.seo.fb_url'=>'http://yourdomain.com',
            'app.seo.fb_image'=>'',
            'app.seo.gg_name'=>'SEO title on Google',
            'app.seo.gg_description'=>'SEO description on Google',
            'app.seo.gg_image'=>'',
            'app.seo.google'=>'your-google-verification-code',
            'app.seo.bing'=>'your-bing-verification-code',
            'app.seo.alexa'=>'your-alexa-verification-code',
            'app.settings.logo'=>'',
            'app.settings.description'=>'My Blog, My Travel',
    ];
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
        if(Request::method()=='POST'){
            $aInput  = Input::except('_token');
            foreach($aInput as $key=>$value){
                SConfigs::where('key',str_replace("_",".",$key))->update(['value'=>$value]);
            }
            \Session::flash('flash_mes', ['Success!']);
            \Session::flash('flash_ok', 1);
        }
        foreach($this::$keysConfig as $key=>$value){
            $exists = SConfigs::where('key',$key)->first();
            if(count($exists)<=0){
                $newConfig = new SConfigs();
                $newConfig->key= $key;
                $newConfig->value = $value;
                $newConfig->title = $value;
                $newConfig->description = $value;
                $newConfig->state = 1;
                $newConfig->save();
                //SConfigs::create(['key'=>$key,'value'=>$value]);
            }
        }
        $configs = SConfigs::where('state',1)->get();
        $config = SConfigs::where('state', '=', 1)->get();
        if(isset($config) && count($config) > 0){
            foreach($config as $cfg){
                \Config::set($cfg->key, $cfg->value);
            }
        }
        Common::metaDefault();
        return view('admin.settings.site',['configs'=>$configs]);
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

    public function frontmenu(){
        if(Request::wantsJson() || Request::ajax()){
            return $this::saveMenu(Input::get('menu'));
        }
        $categories = Category::select('id','name')->get();
        if(isset($_GET['s_update'])){
            Cache::forget('menu_front');
        }
        $menu = Cache::get('menu_front',[]);
        //$menu = json_encode($menu);
        $categories = Category::select('id','name')->whereNotIn('id',$menu)->get();
        if(!empty($menu)){
            $ids_ordered = implode(',', $menu);
            $menu = Category::whereIn('id',$menu)->orderByRaw(DB::raw("FIELD(id, $ids_ordered)"))->get();
        }

        return view('admin.settings.menu',['categories'=>$categories,'menu'=>$menu]);
    }

    private function saveMenu($aInput){
        $aMenu = [];
        foreach($aInput as $row){
            $row = Common::convertArrayToObj($row);
            $aMenu[] = $row->id;
        }
        Cache::forever('menu_front',$aMenu);
        return Response::json($aInput);
    }


}
