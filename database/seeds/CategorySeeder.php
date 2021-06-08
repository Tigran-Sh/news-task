<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['sport', 'history', 'business'];

        foreach ($categories as $category) {
            Category::create([
                'title' => ucfirst($category)
            ]);
        }
    }
}
