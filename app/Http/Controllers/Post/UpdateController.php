<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $updateRequest)
    {
        $validated = $updateRequest->validated();
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $success = $this->service->update($post, $validated, $tags);

        if ($success) {
            return redirect()->route('post.show', $post->id)->with('success', 'Post was updated');
        } else {
            return back()->withErrors('НError Post was not updated')->withInput();
        }
    }
}
