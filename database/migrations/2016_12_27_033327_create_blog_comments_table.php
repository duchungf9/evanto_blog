<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogCommentsTable extends Migration {

	public function up()
	{
		Schema::create('blog_comments', function(Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('post_id')->unsigned()->index();
			$table->enum('status', array('pending', 'publish', 'spam'));
			$table->timestamps();
			$table->softDeletes();
			$table->string('ip', 15)->index();
			$table->string('user_agent', 255);
		});
	}

	public function down()
	{
		Schema::drop('blog_comments');
	}
}