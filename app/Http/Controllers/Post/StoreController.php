<?php

namespace App\Http\Controllers\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $validated = $request->validated();
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        try {
            $post = Post::create($validated);
            if ($post) {
                if (!empty($tags)) {
                    $post->tags()->attach($tags);
                }
                return redirect()->route('post.index');
            } else {
                return back()->withErrors('Не удалось создать пост');
            }
        } catch (\Exception $e) {
            dd('Ошибка при создании поста: ', $e->getMessage());
        }
    }
}
