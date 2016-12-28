<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \App\Http\Model\Category;
use \App\Http\Model\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Admin\AdminController;
use Request, stdClass;

class PostController extends AdminController
{

    private $aRules = [
        'category_id' => 'required',
        'title' => 'required',
        'slug' => 'required|unique:blog_posts',
        'content' => 'required',
        'status' => 'required',
        'featured' => 'required',
        'image' => 'mimes:png'
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
            $imageName = $aInputs['slug'] . '.' . $image->getClientOriginalExtension();
            $root = Post::create($aInputs);
            Session::flash('flash_mes', ['Success!']);
            Session::flash('flash_ok', 1);
            return redirect()->action('PostController@show', ['id' => $root->id]);
        } else {
            $oInput = new stdClass();
            foreach ($aInputs as $key => $value) {
                $oInput->$key = $value;
            }
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
        $cdbPost = Post::find($id);
        $aRules = [
            'category_id' => 'required|numeric',
            'title' => 'required',
            'slug' => ['required', Rule::unique('blog_posts')->ignore($cdbPost->id)],
            'content' => 'required',
            'status' => 'required|numeric',
            'featured' => 'required|numeric',
            'image' => 'mimes:png'
        ];
        $aInputs = Input::except('_token');
        if (isset($aInputs['slug'])) {
            $aInputs['slug'] = str_slug($aInputs['slug'], '-');
        }
        $validator = Validator::make($aInputs, $aRules);
        if ($validator->passes()) {
            $image = $aInputs['image'];
            $imageName = $aInputs['slug'] . '.' . $image->getClientOriginalExtension();
            $image->move(
                base_path() . '/public/images/posts/', $imageName
            );
            $aInputs['image'] = base_path() . '/public/images/posts/'.$imageName;
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

}

?>