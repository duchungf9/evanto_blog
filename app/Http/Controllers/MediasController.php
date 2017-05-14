<?php

namespace App\Http\Controllers;

use Doctrine\Common\Cache\FilesystemCache;
use RemoteImageUploader\Factory;
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
                    $directoryPath = str_replace("\\","/",$file->getRelativePath());
                    $list[] = '/images/'.$directoryPath.'/'.$file->getFilename();
                    
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

    //upload picass


    public static function picasa($imageStoragePath=null){
//        if(Request::ajax()){
            $cacher = new FilesystemCache('/tmp');
            $uploader = Factory::create('Flickr', array(
                'cacher'         => $cacher,
                'api_key'        => 'b681c7f6dce08c05cc7caf50ccb8fe0d',
                'api_secret'     => '140305ed26a83a34',

                // if you have oauth_token and secret, you can set
                // to the options to pass
                'oauth_token'        => "72157680634138054-24addaf1029755e3",
                'oauth_token_secret' => "ee8f2c475f8b86cc",
            ));
//            $callbackUrl = 'http'.(getenv('HTTPS') == 'on' ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//
//            $uploader->authorize($callbackUrl);
            $path = isset($imageStoragePath)?$imageStoragePath:'';
            if($path!=''){
                $url = $uploader->upload(public_path().$path);
                return $url;
            }else{
                return false;
            }

//        }
//        $list = [];
//        return view('admin.media.api-upload',compact('list'));
    }


}

?>