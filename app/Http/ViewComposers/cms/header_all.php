<?php

namespace SCMS\Http\ViewComposers\cms;

use Illuminate\View\View;
use DB;
class HotVideo
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
        $cacheMenu = Cache::get('front_menu',[]);
        $view->with('menus', $cacheMenu);
    }
}