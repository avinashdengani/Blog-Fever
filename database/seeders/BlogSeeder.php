<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNews = Category::create(['name' => 'News']);
        $categoryDesign = Category::create(['name' => 'Design']);
        $categoryTechnology = Category::create(['name' => 'Technology']);
        $categoryEngineering = Category::create(['name' => 'Engineering']);

        $tagCustomers = Tag::create(['name' => 'customers']);
        $tagDesign = Tag::create(['name' => 'design']);
        $tagLaravel = Tag::create(['name' => 'Laravel']);
        $tagCoding = Tag::create(['name' => 'coding']);


        $post1 = Post::create([
            'title' => 'We reloaded our office to HOME!',
            'excerpt' => Factory::create()->sentence(rand(12,18)),
            'content' => Factory::create()->paragraphs(rand(3,8), true),
            'image' => 'images/1.jpg',
            'category_id' => $categoryDesign->id,
            'user_id' => 1,
            'published_at' => Carbon::now()->format('y-m-d')
        ]);

        $post2 = Post::create([
            'title' => "Let's make something creative!",
            'excerpt' => Factory::create()->sentence(rand(12,18)),
            'content' => Factory::create()->paragraphs(rand(3,8), true),
            'image' => 'images/1.jpg',
            'category_id' => $categoryDesign->id,
            'user_id' => 1,
            'published_at' => Carbon::now()->format('y-m-d')
        ]);

        $post3 = Post::create([
            'title' => 'Java is Awesome!',
            'excerpt' => Factory::create()->sentence(rand(12,18)),
            'content' => Factory::create()->paragraphs(rand(3,8), true),
            'image' => 'images/1.jpg',
            'category_id' => $categoryEngineering->id,
            'user_id' => 1,
            'published_at' => Carbon::now()->format('y-m-d')
        ]);

        $post4 = Post::create([
            'title' => 'Corona Vaccination is free!',
            'excerpt' => Factory::create()->sentence(rand(12,18)),
            'content' => Factory::create()->paragraphs(rand(3,8), true),
            'image' => 'images/1.jpg',
            'category_id' => $categoryNews->id,
            'user_id' => 1,
            'published_at' => Carbon::now()->format('y-m-d')
        ]);

        $post1->tags()->attach([$tagDesign->id]);
        $post2->tags()->attach([$tagDesign->id, $tagCustomers->id]);
        $post3->tags()->attach([$tagCoding->id, $tagLaravel->id]);
        $post4->tags()->attach([$tagCustomers->id]);
    }
}
