<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index){
            DB::table('posts')->insert([
               'title' => $faker->text(40),
               'body' => $faker->text(300),
            ]);
        }
//         User::factory(10)->create();
        $this->call(CategoryTableSeeder::class);
    }
}
