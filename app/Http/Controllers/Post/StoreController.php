<?php

namespace App\Http\Controllers\Post;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);

        $post = $this->service->store($validated, $tags);

        if ($post) {
            return redirect()->route('post.index')->with('success', ' Post was created successfully');
        } else {
            return back()->withErrors('Post was Not created successfully')->withInput();
        }
    }
}
