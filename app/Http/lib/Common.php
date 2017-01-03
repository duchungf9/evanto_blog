<?php

namespace App\Http\Lib;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File,stdClass;

class Common  {

	/*

		Function to convert an array to object
		params: 
		$array : the array needed to convert to object
		

		OUTPUT: (string): object

	*/
	public static function convertArrayToObj($array){
        $oObject = new stdClass();
        foreach ($array as $key => $value) {
            $oObject->$key = $value;
        }
        return $oObject;
	}
	
	/*

		Function to upload image to 'image' field of post
		params: 
		$image : the file prepare to upload after
		$prefix: the prefix of image name
		$postId: default value is null, if isset $postId we will delete old image

		OUTPUT: (string): return image path.

	*/
	public static function uploadImage($image,$prefix,$postId=null){
		if($postId!=null){
			$cdbPost = Self::find($postId);
            $pathOldImageNeedDelete  = $cdbPost->image;
            File::delete($pathOldImageNeedDelete);
		}
        $imageName = $prefix . '.' . $image->getClientOriginalExtension();
        $image->move(
            base_path() . '/public/images/posts/', $imageName
        );
        $result = '/images/posts/'.$imageName;
        return $result;
	}

}