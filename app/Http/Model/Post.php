<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Post extends Model {

	protected $table = 'blog_posts';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $guarded = array('id');

	public function category()
	{
		return $this->belongsTo('\App\Http\Model\Category', 'category_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function tags()
	{
		return $this->belongsToMany('PostTag');
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
            $pathOldImageNeedDelete  = base_path() . '/public'.$cdbPost->image;
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