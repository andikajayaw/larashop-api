<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $faker = Faker::create();
        $image_categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food',
        'nature', 'technics', 'transport'];
        for($i=0;$i<3;$i++){
            $name = $faker->unique()->word();
            $name = str_replace('.', '', $name);
            $slug = str_replace(' ', '-', strtolower($name));
            $category = $image_categories[mt_rand(0, 8)];
            // $image_path = 'public/images/categories';
            // $image_fullpath = $faker->image( $image_path, 500, 300, $category, true, true, $category);
            // // $image = str_replace($image_path . '/' , '', $image_fullpath);
            // $image = storage_path().$image_fullpath;
            // // $cover = $cover->store('book-covers', 'public');

            // $img = $faker->image( 'public/images/categories', 500, 300, $category, true, true, $category);
            // $image = Storage::disk('public')->put('images/categories/'.$img, 'public');
            $categories[$i] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $faker->imageUrl(500, 300, $category, true, true, $category),
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
