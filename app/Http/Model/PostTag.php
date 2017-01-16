<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model {

	protected $table = 'blog_post_tag';
	public $timestamps = false;

	public function posts()
	{
		return $this->belongsTo('Post', 'post_id');
	}

	public function tags()
	{
		return $this->hasOne('Tag');
	}
    public static function gettagsinpost($id){
        $arrayTags = [];
        $cdbTags = PostTag::select('tag_id')->where('post_id',$id)->get()->toArray();
        foreach($cdbTags as $tagid){
            $arrayTags[] = Tag::select('name')->where('id',$tagid['tag_id'])->first();
        }
        return $arrayTags;
    }

}