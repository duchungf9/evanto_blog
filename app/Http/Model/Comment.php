<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

	protected $table = 'blog_comments';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $guarded = array('id');

	public function post()
	{
		return $this->belongsTo('Post', 'post_id');
	}

}