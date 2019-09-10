<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $title = str_random(10);
        $slug = Str::snake($title);
      
            $faker = Faker::create();
    	foreach (range(1,10) as $index) {
            DB::table('categories')->insert([
                'name' => $title,
                'slug' => $slug,
                'description' => Str::random(100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
	}
        
    }
}
