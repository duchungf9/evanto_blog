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
        'slug' => 'required|unique:blog_posts',
        'content' => 'required',
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


}

?>