<?php

namespace App\Http\Controllers;

use App\Http\Model\PostTag;
use App\Http\Model\Tag;
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

class ProductController  extends AdminController
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
    private $sViewPath = "/admin/product/";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nCountCat = Category::select('id')->count();
        if ($nCountCat <= 0) {
            Session::flash('flash_mes', ['you need to create at least one category before posting a new product']);
            return redirect()->action('CategoryController@index');
        }
        return view($this->sViewPath . 'blog_products');
    }

    //public function product(){
    //    $nCountCat = Category::select('id')->count();
    //    if ($nCountCat <= 0) {
    //        Session::flash('flash_mes', ['you need to create at least one category before posting a new product']);
    //        return redirect()->action('CategoryController@index');
    //    }
    //    return view($this->sViewPath . 'blog_products');
    //}
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
            return redirect()->action('ProductController@show', ['id' => $root->id]);
        } else {
            $oInput = Common::convertArrayToObj($aInputs);
            Session::flash('oldInput', $oInput);
            return view($this->sViewPath . 'blog_products')->with('mes', $validator->errors()->all());
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
        $tags = $this->gettagsinpost($id);
        $aTags = [];
        foreach($tags as $tag){
            if(isset($tag->name)){
                $aTags[] =  $tag->name;
            }
        }

        return view($this->sViewPath . 'blog_products', ['post' => $cdbCategory,'tags'=>$aTags]);
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
        return redirect()->action('ProductController@show', ['id' => $cdbPost->id]);
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
    /*
    |--------------------------------------------------------------------------
    | Get all  Categories's id - AJAX - ANGULARJS
    |--------------------------------------------------------------------------
    | Get all  Categories's id
    | return : JSON.
    |
    */
    public function catIds()
    {
        if (Request::wantsJson()) {
            $cdbCategories = Category::select('id', 'name')->get();
            return Response::json($cdbCategories);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Get all  Posts
    |--------------------------------------------------------------------------
    | Get list of  posts .
    | return : render to VIEW.
    |
    */
      public function listPosts(){
            $cdbListCate = Post::select('id','title','slug','status','featured')->where('type','product')->paginate(10);
            return view($this->sViewPath.'blog_products_list',['list'=>$cdbListCate]);
      }
    /*
    |--------------------------------------------------------------------------
    | Search for a speacial Post -  AJAX - Angiular
    |--------------------------------------------------------------------------
    | Search for a speacial Post in List by keywords
    | return : JSON
    |
    */
      public function searchfilter(){
          $sSearchString = Input::get('string');
              $cdbListPosts = Post::select('title','slug','id')
                  ->where('slug','like',"%".$sSearchString."%")
                  ->orWhere('title','like',"%".$sSearchString."%")
                  ->orWhere('description','like',"%".$sSearchString."%")
                  ->take(10)->orderBy('id','DESC')->get();

              return Response::json($cdbListPosts);

      }
    /*
    |--------------------------------------------------------------------------
    | Get all featured Post
    |--------------------------------------------------------------------------
    | Get list of featured posts .
    | return : render to VIEW.
    |
    */
      public function featured(){
          $cdbListCate = Post::select('id','title','slug','status','featured')->where('featured',1)->where('status','publish')->where('type','product')->paginate(10);
          return view($this->sViewPath.'blog_products_list',['list'=>$cdbListCate]);
      }
    /*
    |--------------------------------------------------------------------------
    | Delete a Post - AJAX Request
    |--------------------------------------------------------------------------
    | Delate a post by ID
    | return : string.
    |
    */
      public function delPosts(){
          if(Request::ajax() || Request::wantsJson()){
              $post = Post::find(Input::get('post')['id']);
              if($post){
                  $post->delete();
                  return 'ok';
              }
          }
      }
    /*
    |--------------------------------------------------------------------------
    | Set a Post as Publish status
    |--------------------------------------------------------------------------
    | Change status of Post as publish or draft
    | return : string.
    |
    */
    public function publish(){
        $nPostId = Input::get('pid');
        $cdbPost = Post::find($nPostId);
        if($cdbPost){
            $cdbPost->status = Input::get('status');
            $cdbPost->save();
            return 'ok';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Set a Post as Featured Post or Unset featured Post
    |--------------------------------------------------------------------------
    | Configs for Featured Post
    | return : string.
    |
    */
    public function setfeatured(){
        $nPostId = Input::get('pid');
        $cdbPost = Post::find($nPostId);
        if($cdbPost){
            $cdbPost->featured = Input::get('status');
            $cdbPost->save();
            return 'ok';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Save Tags  in a Post
    |--------------------------------------------------------------------------
    | save Tag of Post for friendly SEO.
    | return : Json.
    |
    */
    public function savetags(){
        $stringTags = Input::get('tags');
        $aTags = explode(",",$stringTags);
        foreach($aTags as $tag){
            if(trim($tag)!=""){
                $tagSlug = str_slug($tag,"-");
                $findTag  = Tag::where('slug',$tagSlug)->first();
                if(count($findTag)<=0){
                    $TagModel = new Tag;
                    $TagModel->name = $tag;
                    $TagModel->slug = $tagSlug;
                    $saveResult = $TagModel->save();
                    if($saveResult){
                        $findTagPost =  PostTag::where('post_id',Input::get('pid'))->where('tag_id',$TagModel->id)->first();
                        if(count($findTagPost)<=0){
                            $tagPostModel = new PostTag;
                            $tagPostModel->tag_id = $TagModel->id;
                            $tagPostModel->post_id = Input::get('pid');
                            $tagPostModel->save();
                        }
                    }
                }else{
                    $findTagPost =  PostTag::where('post_id',Input::get('pid'))->where('tag_id',$TagModel->id)->first();
                    if(count($findTagPost)<=0){
                        $tagPostModel = new PostTag;
                        $tagPostModel->tag_id = $TagModel->id;
                        $tagPostModel->post_id = Input::get('pid');
                        $tagPostModel->save();
                    }
                }
            }

        }
        $arrayTags = $this->gettagsinpost(Input::get('pid'));
        $aTags = [];
        foreach($arrayTags as $tag){
            if(isset($tag->name)){
                $aTags[] =  $tag->name;
            }
        }
        return Response::json($aTags);
    }
    /*
    |--------------------------------------------------------------------------
    | Get all Tags content in a Post
    |--------------------------------------------------------------------------
    |
    | return : arrray.
    |
    */

    public function saveprice(){
        try{
            $cdbPost = Post::find(Input::get('pid'));
            $arrayMetas = Input::except('_token','pid');
            if($cdbPost!=null){
                $oldMeta = json_decode($cdbPost->json_params);
                $oldMeta->price = Input::get('price');
                foreach($oldMeta as $key=>$value){
                    foreach($arrayMetas as $k=>$v){
                        if($key==$k){
                            $oldMeta->$key = $v;
                        }
                    }
                }
                $cdbPost->update(['json_params'=>json_encode($oldMeta)]);
                if($cdbPost->save()){
                    return 'ok';
                }else{
                    return 'false';
                }
            }
            return 'false';
        }catch(\Exception $e){
            dd($e);
        }

    }
    public function savemeta(){
        $cdbPost = Post::find(Input::get('pid'));
        $arrayMetas = Input::except('_token','pid');
        $oldMeta = json_decode($cdbPost->json_params);
        foreach($oldMeta as $key=>$value){
            foreach($arrayMetas as $k=>$v){
                if($key==$k){
                    $oldMeta->$key = $v;
                }
            }
        }
        if($cdbPost!=null){
            $cdbPost->update(['json_params'=>json_encode($oldMeta)]);
            if($cdbPost->save()){
                return 'ok';
            }else{
                return 'false';
            }
        }
        return 'false';
    }
    /*
    |--------------------------------------------------------------------------
    | Get all Tags content in a Post
    |--------------------------------------------------------------------------
    |
    | return : arrray.
    |
    */
    private function gettagsinpost($id){
        $arrayTags = [];
        $cdbTags = PostTag::select('tag_id')->where('post_id',$id)->get()->toArray();
        foreach($cdbTags as $tagid){
            $arrayTags[] = Tag::select('name')->where('id',$tagid['tag_id'])->first();
        }
        return $arrayTags;
    }

    public function listProducts(){
        $cdbListCate = Post::select('id','title','slug','status','featured')->where('type','product')->paginate(10);
        return view($this->sViewPath.'blog_products_list',['list'=>$cdbListCate]);
    }

}

?>