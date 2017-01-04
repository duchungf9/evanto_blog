<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \App\Http\Model\Category;
use \App\Http\Model\Post;
use \App\Http\Lib\Common;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Admin\AdminController;
use Request, stdClass,Cache;

class PostController extends AdminController
{

    private $aRules = [
        'category_id' => 'required|numeric',
        'title' => 'required',
        'slug' => 'required|unique:blog_posts',
        'content' => 'required',
        'status' => 'required',
        'featured' => 'required|numeric',
        'image' => 'mimes:jpeg,bmp,png'
    ];
    private $sViewPath = "/admin/post/";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nCountCat = Category::select('id')->count();
        if ($nCountCat <= 0) {
            Session::flash('flash_mes', ['you need to create at least one category before posting a new post']);
            return redirect()->action('CategoryController@index');
        }
        return view($this->sViewPath . 'blog_posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $aInputs = Input::except('_token');
        if (isset($aInputs['slug'])) {
            $aInputs['slug'] = str_slug($aInputs['slug'], '-');
        }
        $validator = Validator::make($aInputs, $this->aRules);
        if ($validator->passes()) {
            $image = $aInputs['image'];
            $aInputs['image'] = Post::uploadImage($image,$aInputs['slug']);
            $root = Post::create($aInputs);
            Session::flash('flash_mes', ['Success!']);
            Session::flash('flash_ok', 1);
            return redirect()->action('PostController@show', ['id' => $root->id]);
        } else {
            $oInput = Common::convertArrayToObj($aInputs);
            Session::flash('oldInput', $oInput);
            return view($this->sViewPath . 'blog_posts')->with('mes', $validator->errors()->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $cdbCategory = Post::find($id);
        return view($this->sViewPath . 'blog_posts', ['post' => $cdbCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
//        dump(Input::all());
        $cdbPost = Post::find($id);
        $aRules = [
            'category_id' => 'required|numeric',
            'title' => 'required',
            'slug' => ['required', Rule::unique('blog_posts')->ignore($cdbPost->id)],
            'content' => 'required',
            'status' => 'required',
            'featured' => 'required|numeric',
            'image' => 'mimes:jpeg,bmp,png'
        ];
        $aInputs = Input::except('_token');
        if (isset($aInputs['slug'])) {
            $aInputs['slug'] = str_slug($aInputs['slug'], '-');
        }
//        $aInput['image'] = (isset($aInput['image']))?$aInput['image']:"";
        $validator = Validator::make($aInputs, $aRules);
        if ($validator->passes()) {
            $image = isset($aInputs['image'])?$aInputs['image']:$cdbPost->image;
            $aInputs['image'] = ($image!=""&&$image!=$cdbPost->image)?Post::uploadImage($image,$aInputs['slug'],$cdbPost->id):$cdbPost->image;
            $cdbPost->update($aInputs);
            Session::flash('flash_mes', ['Success!']);
            Session::flash('flash_ok', 1);
        } else {
            Session::flash('flash_mes', $validator->errors()->all());
        }
        return redirect()->action('PostController@show', ['id' => $cdbPost->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function catIds()
    {
        if (Request::wantsJson()) {
            $cdbCategories = Category::select('id', 'name')->get();
            return Response::json($cdbCategories);
        }
    }

      public function listPosts(){
            $cdbListCate = Post::select('id','title','slug')->paginate(10);
            return view($this->sViewPath.'blog_posts_list',['list'=>$cdbListCate]);
      }

      public function searchfilter(){
          $sSearchString = Input::get('string');
//          $cacheGetResult = $john = Cache::tags(['searchString', $sSearchString])->get($sSearchString);
//          if($cacheGetResult==null){
              $cdbListPosts = Post::select('title','slug','id')
                  ->where('slug','like',"%".$sSearchString."%")
                  ->orWhere('title','like',"%".$sSearchString."%")
                  ->orWhere('description','like',"%".$sSearchString."%")
                  ->take(10)->orderBy('id','DESC')->get();

//              Cache::tags(['searchString', $sSearchString])->put($sSearchString, $cdbListPosts, 1000);
              return Response::json($cdbListPosts);
//          }
//          return Response::json($cacheGetResult);

      }

      public function featured(){
          $cdbListCate = Post::select('id','title','slug')->where('featured',1)->where('status','publish')->paginate(10);
          return view($this->sViewPath.'blog_posts_list',['list'=>$cdbListCate]);
      }
      public function delPosts(){
          if(Request::ajax() || Request::wantsJson()){
              $post = Post::find(Input::get('post')['id']);
              if($post){
                  $post->delete();
                  return 'ok';
              }
          }
      }

}

?>