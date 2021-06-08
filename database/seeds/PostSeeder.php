<?php

use App\Models\Category;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
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
            $title = $faker->text(50);
            $text = $faker->text;
            $slug = Str::slug($title);

            $post = Post::create([
                'title' => $title,
                'content' => $text,
                'slug' => $slug
            ]);
            $randNumber = random_int(0,2);
            $category_ids = Category::pluck('id')->toArray();
            unset($category_ids[$randNumber]);
            $post->categories()->attach($category_ids);
        }
    }
}
