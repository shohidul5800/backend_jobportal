<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory('App\User', 10)->create();
////        factory('App\Company', 10)->create();
////        factory('App\Jobs', 10)->create();

        $categorys = ['Information Technology', 'Hospitality', 'Trade/NGO', 'Banking', 'Marketing'];

        foreach ($categorys as $category) {
            \App\Category::create([
                'name' => $category,
            ]);
        }
    }
}
