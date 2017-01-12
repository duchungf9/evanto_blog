<?php

namespace App\Http\ViewComposers\Cms;

use App\Http\Model\Category;
use Illuminate\View\View;
use DB,Cache;
class HeaderAll
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cacheMenu = Cache::get('menu_front',[]);
        $menus = [];
        if(count($cacheMenu)>0){
            $menus =  Category::select('id','name','slug')->whereIn('id',$cacheMenu)->get();
        }
        $view->with('menus', $menus);
    }
}