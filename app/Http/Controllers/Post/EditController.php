<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }
}
