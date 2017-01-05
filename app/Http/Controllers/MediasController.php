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
use Request, stdClass,Cache,File,URL;

class MediasController extends AdminController
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

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
    }

    public function listMedias(){
        $list = [];
        $files = File::allFiles(public_path().'\images');
        $aAllowExtensions = ['png','jpg','gif','bmp'];
        if(count($files)>=0){
            foreach($files as $file){
                $type = $file->getExtension();
                if(in_array($type,$aAllowExtensions)){
                    $list[] = '/images/'.$file->getRelativePath().'/'.$file->getFilename();
                }
            }
        }
        return view('admin.media.list',compact('list'));
    }

    public function deleteimage(){
        $image = Input::get('image');
        if(File::exists(public_path().$image)){
            File::delete(public_path().$image);
            return 'ok';
        }
        return 'false';
    }


}

?>