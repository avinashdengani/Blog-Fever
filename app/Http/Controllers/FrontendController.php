<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('blogs.index', compact(['posts']));
    }
}
