<?php

namespace App\Http\ViewComposers\Nuockhoang365;

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
            $ids_ordered = implode(',', $cacheMenu);
            $menus =  Category::select('id','name','slug')->whereIn('id',$cacheMenu)->orderByRaw(DB::raw("FIELD(id, $ids_ordered)"))->get();
        }
        $view->with('menus', $menus);
    }
}