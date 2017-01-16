<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Category;
use App\Http\Model\Post;
class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$faker = Faker\Factory::create();

//		$limit = 21;
//		for ($i = 1; $i < $limit; $i++) {
//			$title = $faker->unique()->city;
//			$slug = str_slug($title,"-");
//			Category::create([
//				'name' => $title,
//				'slug' => $slug,
//				'description' => $faker->sentence(20),
//			]);
//		}
		$limit = 7000;
		for ($i = 0; $i < $limit; $i++) {
			$title = $faker->unique()->company;
			$slug = str_slug($title,"-");
			DB::table('blog_posts')->insert([
				'category_id' => rand(1,20),
				'title' => $title,
				'slug' => $slug,
				'description' => $faker->Text,
				'summary' => str_limit($faker->Text,27,"..."),
				'content' => $faker->realText(1000,2),
				'status' => 'publish',
				'featured' => 0,
				'image' => "https://unsplash.it/700/5".rand(0,9).rand(0,9)."/?random",
			]);
		}
		$this->command->info('Post table seeded!');
	}
}