<?php

namespace App\Http\Controllers;

use App\Http\Model\PostTag;
use App\Http\Model\Tag;
use Illuminate\Support\Facades\Schema;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \App\Http\Model\Category;
use \App\Http\Model\Post;
use \App\Http\Lib\Common;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Admin\AdminController;
use Request, stdClass,Cache,DB;

class PageController extends AdminController
{

    private $aRules = [
        'title' => 'required',
        'slug' => 'required'
    ];
    private $sViewPath = "/admin/page/";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Schema::hasTable('pages')==false){
            Schema::create('pages',function($table){
                $table->increments('id');
                $table->string('title', 255);
                $table->string('slug', 255);
                $table->text('content');
            });
        }

        $pages = DB::table('pages')->paginate(10);

        return view('admin.page.page_list',['list'=>$pages]);
    }

    public function delete(){
        if(Request::ajax() || Request::wantsJson()){
            $post = DB::table('pages')->where('id',Input::get('page')['id'])->delete();
            if($post){
                return 'ok';
            }
        }
    }

    public function create($page=null){
        if(Request::method() == 'POST'){
            $aInputs = Input::except('_token');
            if (isset($aInputs['slug'])) {
                $aInputs['slug'] = str_slug($aInputs['slug'], '-');
            }
            $validator = Validator::make($aInputs, $this->aRules);
            if ($validator->passes()) {
                if($page!=null){
                    DB::table('pages')->where('id',$page)->update($aInputs);
                    $root = $page;
                }else{
                    $root = DB::table('pages')->insertGetId($aInputs);
                }

                Session::flash('flash_mes', ['Success!']);
                Session::flash('flash_ok', 1);
                return redirect()->action('PageController@create', ['id' => $root]);
            } else {
                $oInput = Common::convertArrayToObj($aInputs);
                Session::flash('oldInput_page', $oInput);
                return view('admin.page.create')->with('mes', $validator->errors()->all());
            }
        }
        if($page!=null){
            $page = DB::table('pages')->where('id',$page)->first();
            if($page==null){
                echo 'page not found';
            }
            return view('admin.page.create',['page'=>json_encode($page)]);
        }
        return view('admin.page.create');
    }


}

?>