<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

	protected $table = 'blog_posts';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $guarded = array('id');

	public function category()
	{
		return $this->belongsTo('Categories', 'category_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function tags()
	{
		return $this->belongsToMany('PostTag');
	}

}