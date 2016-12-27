<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \App\Http\Model\Category;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      return view('admin/blog_categories');
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
  private $aRules = [
      'name'=>'required|unique:categories',
      'slug'=>'required|unique:categories'
  ];
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
        return view('admin/blog_categories')->with('mes',$validator->errors()->all());
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
      return view('admin/blog_categories',['category'=>$cdbCategory]);
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
          'name'=>'required|unique:categories,name,'.$cdbCategory->name,
          'slug'=>'required|unique:categories,slug,'.$cdbCategory->slug
      ];
      $validator = Validator::make(Input::except('_token'),$aRules);
      if($validator->passes()){
          $cdbCategory->update(Input::except('_token'));
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
  
}

?>