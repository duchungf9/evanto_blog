<?php

namespace App\Http\ViewComposers\Cms;

use App\Http\Model\Category;
use App\Http\Model\SConfigs;
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
        $menu = SConfigs::where('key','app.menu')->first();
        if(!$menu){$menu=[];}else{$menu=unserialize($menu->value);}
        $menus = [];
        if(count($menu)>0){
            $ids_ordered = implode(',', $menu);
            $menus =  Category::select('id','name','slug')->whereIn('id',$menu)->orderByRaw(DB::raw("FIELD(id, $ids_ordered)"))->get();
        }
        $view->with('menus', $menus);
    }
}