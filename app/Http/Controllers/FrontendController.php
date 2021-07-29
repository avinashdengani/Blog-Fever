<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::search()
                ->latest('published_at')
                ->published()
                ->approvedPosts()
                ->simplePaginate(3);
        $tags = Tag::all();
        $categories = Category::all();

        return view('blogs.index', compact(['posts', 'tags', 'categories']));
    }

    public function show(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('blogs.post', compact(['post', 'categories', 'tags']));
    }
    public function category(Category $category)
    {
        $posts = $category->posts()
                ->search()
                ->latest('published_at')
                ->published()
                ->simplePaginate(3);

        $tags = Tag::all();
        $categories = Category::all();
        return view('blogs.index', compact(['posts', 'tags', 'categories']));
    }
    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
                ->search()
                ->latest('published_at')
                ->published()
                ->simplePaginate(3);

        $tags = Tag::all();
        $categories = Category::all();
        return view('blogs.index', compact(['posts', 'tags', 'categories']));
    }
}
