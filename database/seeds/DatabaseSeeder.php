<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Category;
use App\Http\Model\Post;
class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		Category::create(array(
			'name' => 'Test category - 1',
			'slug' => 'test-category-1',
			'description' => 'Test category - 1 Meta Desc'
		));

		// Test category - 2
		Category::create(array(
			'name' => 'Test category - 2',
			'slug' => 'test-category-2',
			'description' => 'Test category - 2 Meta Desc'
		));

		// Test category - 3
		Category::create(array(
			'name' => "Test category - 3",
			'slug' => "Test category - 3",
			'description' => "Test category - 3"
		));

		// Test category - 4
		Category::create(array(
			'name' => 'Test category - 4',
			'slug' => 'test-category-4',
			'description' => 'Test category - 4 Meta Desc'
		));
		$this->command->info('Category table seeded!');

		Post::create(array(
			'category_id' => 1,
			'title' => 'İleti test - 1',
			'slug' => 'ileti-test-1',
			'description' => 'İleti test - 1',
			'summary' => 'İleti test - summary - 1',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius eros ut ornare tempus. Cras a ligula lectus. Pellentesque eget tempor arcu. Proin nisl mi, auctor sit amet ornare vitae, egestas sit amet ante. Phasellus sit amet lobortis risus. Nam consectetur nisi consectetur aliquet condimentum. Morbi eu lacus in neque bibendum ultricies vel in risus.',
			'status' => 'publish',
			'comments' => 1
		));

		// ileti test - 2
		Post::create(array(
			'category_id' => 1,
			'title' => 'İleti test - 2',
			'slug' => 'ileti-test-2',
			'description' => 'İleti test - 2',
			'summary' => 'İleti test - summary - 2',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius eros ut ornare tempus. Cras a ligula lectus. Pellentesque eget tempor arcu. Proin nisl mi, auctor sit amet ornare vitae, egestas sit amet ante. Phasellus sit amet lobortis risus. Nam consectetur nisi consectetur aliquet condimentum. Morbi eu lacus in neque bibendum ultricies vel in risus.',
			'status' => 'publish',
			'comments' => 1
		));
		$this->command->info('Post table seeded!');
	}
}