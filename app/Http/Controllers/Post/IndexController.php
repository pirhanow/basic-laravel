<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Pagination\Paginator;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
