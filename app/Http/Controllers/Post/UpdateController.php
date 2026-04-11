<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(Post $post, UpdateRequest $updateRequest)
    {
        $validated = $updateRequest->validated();

        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $post->update($validated);

        if (!empty($tags)) {
            $post->tags()->sync($tags);
        }

        return redirect()->route('post.show', $post->id);
    }
}
