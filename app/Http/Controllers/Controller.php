<?php

namespace App\Http\Controllers;

use App\Http\Lib\Common;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\SConfigs;
use Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $config = SConfigs::where('state', '=', 1)->get();
        if(isset($config) && count($config) > 0){
            foreach($config as $cfg){
                Config::set($cfg->key, $cfg->value);
            }
        }
        Common::metaDefault();
    }
}
