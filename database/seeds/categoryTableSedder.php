<?php

use Illuminate\Database\Seeder;

class categoryTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 1000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->name,
                'slug' => str_slug($faker->unique()->name,'-'),
                'description' => $faker->Text,
            ]);
        }
    }
}
