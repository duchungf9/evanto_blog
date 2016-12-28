<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \App\Http\Model\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Admin\AdminController;
use Request;
class CategoryController extends AdminController {

    private $aRules = [
        'name'=>'required|unique:categories',
        'slug'=>'required|unique:categories'
    ];
    private $sViewPath = "/admin/category/";

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      return view($this->sViewPath.'blog_categories');
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
      if(isset($aInputs['slug'])){
        $aInputs['slug'] = str_slug($aInputs['slug'],'-');
      }
      $validator = Validator::make($aInputs,$this->aRules);
      if($validator->passes()){
        $root = Category::create([
            'name' => $aInputs['name'],
            'slug'=> $aInputs['slug'],
            'description'=>$aInputs['description']
        ]);
      Session::flash('flash_mes', ['Success!']);
      Session::flash('flash_ok', 1);
        return redirect()->action('CategoryController@show',['id'=>$root->id]);
      }else{
        return view($this->sViewPath.'blog_categories')->with('mes',$validator->errors()->all());
      }
  }

  /**
   * Display the specified resource....
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $cdbCategory = Category::find($id);
      return view($this->sViewPath.'blog_categories',['category'=>$cdbCategory]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      $cdbCategory = Category::find($id);
      $aRules = [
          'name'=>['required',Rule::unique('categories')->ignore($cdbCategory->id)],
          'slug'=>['required',Rule::unique('categories')->ignore($cdbCategory->id)]
      ];
      $aInputs = Input::except('_token');
      if(isset($aInputs['slug'])){
          $aInputs['slug'] = str_slug($aInputs['slug'],'-');
      }
      $validator = Validator::make($aInputs,$aRules);
      if($validator->passes()){
          $cdbCategory->update($aInputs);
          Session::flash('flash_mes', ['Success!']);
          Session::flash('flash_ok', 1);
      }else{
          Session::flash('flash_mes', $validator->errors()->all());
      }
      return redirect()->action('CategoryController@show',['id'=>$cdbCategory->id]);


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  public function listCategories(){
        $cdbListCate = Category::select('id','name','slug')->paginate(10);
        return view($this->sViewPath.'blog_categories_list',['list'=>$cdbListCate]);
  }

  public function delCategories(){
      if(Request::ajax() || Request::wantsJson()){
          $category = Category::find(Input::get('cat')['id']);
          if($category){
              $category->delete();
              return 'ok';
          }

      }
  }
  
}

?>