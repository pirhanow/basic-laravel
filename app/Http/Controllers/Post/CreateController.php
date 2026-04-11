<?php

namespace App\Http\Controllers\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
}
