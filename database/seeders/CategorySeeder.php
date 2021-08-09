<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'name_cate' => $faker->name,
                'slug'=>$faker->slug,
                'image'=>$faker->image('public/storage/backend/category/', 300, 300, null, false),
                'image_describe'=>'Đây là ảnh số '.$i,
                'status'=>$faker->numberBetween($min=0,$max=1),
                'date_add'=>$faker->dateTime($max = 'now', $timezone = null),
            ];
            DB::table('categories')->insert($data);
        }
    }
}
