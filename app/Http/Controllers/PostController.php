<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'post_content' => 'required|string',
            'likes' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ]);
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        try {
            $post = Post::create($validated);
            // Проверка, что пост создан
            if ($post) {
                // Прикрепляем теги, если есть
                if (!empty($tags)) {
                    $post->tags()->attach($tags);
                }
                return redirect()->route('post.index');
            } else {
                return back()->withErrors('Не удалось создать пост');
            }
        } catch (\Exception $e) {
            // Вывод ошибки для диагностики
            dd('Ошибка при создании поста: ', $e->getMessage());
            // Или можно вернуть ошибку назад
            // return back()->withErrors($e->getMessage());
        }
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'likes' => 'required|integer',
            'category_id' => '', // Можно сделать nullable и проверку
            'tags' => 'nullable|array',
        ]);

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $post->update($validated);
        // Обновляем связи тегов, если есть
        if (!empty($tags)) {
            $post->tags()->sync($tags);
        }
        $post = $post->fresh();

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}
