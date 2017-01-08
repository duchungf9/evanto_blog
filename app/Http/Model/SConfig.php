<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SConfigs extends Model {
    protected $table = 's_configs';
    public static $rules = array(
        "id_category" => "required|integer",
        "title" => "required|unique:configs|max:255",
        "key" => "required|unique:configs|max:255",
        "value" => "required|max:255",
    );


}