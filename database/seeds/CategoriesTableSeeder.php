<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'SAE Notes']);
        Category::create(['title' => 'Thoughts']);
        Category::create(['title' => 'Travel']);
        Category::create(['title' => 'Movies to watch']);
    }
}
